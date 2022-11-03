<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Rules\Captcha;




class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        //return view('page.trangchu', ['slide' => $slide]);

        $new_pr = DB::table('products')->where('new', 1)->paginate(4, ['*'], 'page');
        $sp_km = Product::where('promotion_price', '!=', 0)->paginate(4, ['*'], 'page1')->withQueryString();

        return view('page.trangchu', compact('slide', 'new_pr', 'sp_km'));
    }

    public function getLoaiSanPham($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        return view('page.loaisp', compact('sp_theoloai', 'sp_khac', 'loai'));
    }
    public function getChiTietSanPham(Request $req)
    {
        $sanpham = Product::where('id', $req->id)->first();
        $new_pr = DB::table('products')->where('new', 1)->paginate(4, ['*'], 'page');
        $selling_pr = Product::paginate(4);
        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(3);
        return view('page.chitietsp', compact('sanpham', 'sp_tuongtu', 'new_pr', 'selling_pr'));
    }
    public function getLienHe()
    {
        return view('page.lienhe');
    }
    public function getGioiThieu()
    {
        return view('page.gioithieu');
    }




    public function getLogin()
    {
        return view('page.login');
    }

    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu tối đa 20 ký tự'
        ]
        );
        $credentials=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'alert','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }
    public function getSignup()
    {
        return view('page.signup');
    }
    
    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('trang_chu');
    }
    public function getLoginAdmin(){
        return view('admin.sign-in');
    }
    public function postLoginAdmin(Request $request){
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20',
            'g-recaptcha-response' => new Captcha(),
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử  dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            
        ]
        );
        $credentials=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($credentials)){
            return redirect('/admin/custommer')->with(['flag'=>'alert','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
        
    }   
    public function getSignOutAdmin(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('sign_in');
    }
    public function getForgot(){
        return view('admin.forgot');
    }
    public function getCustommer(){
        return view('admin.custommer');
    }
    public function getUser(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function getProduct(){
        $products = Product::paginate(10);
        return view('admin.products', compact('products'));
    }
    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('admin.update_pr', compact('product'));
    }
    public function updateProduct(Request $req, $id){
        //kiểm tra file tồn tại
        $name='';
        if($req->hasfile('img'))
        {
            $file = $req->file('img');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move('image/product', $name); 
        }
        
        $product = Product::find($id);
        $product->name = $req->name;
        $product->image =$name;
        $product->description = $req->description;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->unit = $req->unit;
        $product->new = $req->new;
        
        $product ->save();
        return redirect()->action([PageController::class, 'getProduct']);
    }
    public function getTypeProduct(){
        $type = ProductType ::all();
        return view('admin.productType', compact('type'));
    }
    public function editTypeProduct($id){
        $type_pr = ProductType::findOrFail($id);
        return view('admin.update_Typepr', compact('type_pr'));
    }
    public function updateTypeProduct(Request $req, $id){
        //kiểm tra file tồn tại
        $name='';
        if($req->hasfile('img'))
        {
            $file = $req->file('img');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move('image/product', $name); 
        }

        $type_pr = ProductType::find($id);
        $type_pr->name = $req->name;
        $type_pr->image =$name;
        $type_pr->description = $req->description;

        $type_pr -> save();
        return redirect()->action([PageController::class, 'getTypeProduct']);
    }
    public function createType(){
        return view('admin.addTypeProduct');
    }
    public function addTypeProduct(Request $request){
        $this->validate($request, 
            [
                //Kiểm tra giá trị rỗng
                'name' => 'required',
                'description' => 'required',
                'image_file'=>'mimes:jpeg,jpg,png,gif|max:10000'
            ],
            [
                //Tùy chỉnh hiển thị thông báo
                'name.required' => 'Bạn chưa nhập tên sản phẩm!',
                'description.required' => 'Bạn chưa nhập mô tả!',
                'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image_file.max' => 'Hình thẻ giới hạn dung lượng không quá 10MB',
            ]        
        );

         //kiểm tra file tồn tại
        $name='';
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source\image\product'); 
            $file->move($destinationPath, $name); 
        }
        $type = new ProductType();
        $type->name=$request->input('name');
        $type->description=$request->input('description');
        $type->image=$name;
        $type->save();
        return redirect('admin/productType')->with('success','Bạn đã thêm loại sản phẩm thành công');
    }

    public function create()
    {
        $type_pr = ProductType::all();
        return view('admin.addProduct', compact('type_pr'));
    }

    public function addProduct(Request $request){
        $this->validate($request, 
            [
                //Kiểm tra giá trị rỗng
                'name' => 'required',
                'description' => 'required',
                'unit_price' => 'required',
                'promotion_price' => 'required',
                'unit' => 'required',
                'new' => 'required',
                'image_file'=>'mimes:jpeg,jpg,png,gif|max:10000'
            ],
            [
                //Tùy chỉnh hiển thị thông báo
                'name.required' => 'Bạn chưa nhập tên sản phẩm!',
                'description.required' => 'Bạn chưa nhập mô tả!',
                'unit_price.required' => 'Giá không được để trống!',
                'promotion_price.required' => 'Giá khuyến mãi không được để trống!',
                'unit.required' => 'Đơn vị không được để trống',
                'new.required' => 'Trạng thái không được để trống',
                'image_file.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'image_file.max' => 'Hình thẻ giới hạn dung lượng không quá 10MB',
            ]        
        );

         //kiểm tra file tồn tại
        $name='';
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('source\image\product'); 
            $file->move($destinationPath, $name); 
        }
        $product = new Product();
            $product->id_type=$request->input('id_type');
            $product->name=$request->input('name');
            $product->description=$request->input('description');
            $product->image=$name;
            $product->unit_price=$request->input('unit_price');
            $product->promotion_price=$request->input('promotion_price');
            $product->unit=$request->input('unit');
            $product->new=$request->input('new');
            $product->save();
        return redirect('admin/products')->with('success','Bạn đã thêm sản phẩm thành công');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        
        return view('admin.edit_us', compact('user'));
    }
    
    public function update(Request $req, $id){
        //kiểm tra file tồn tại
        $name='';
        if($req->hasfile('avatar'))
        {
            $file = $req->file('avatar');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move('images/avatar', $name); 
        }
        $user = User::find($id);
        $user->full_name = $req->full_name;
        $user->image =$name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        
        $user->save();
        return redirect()->action([PageController::class, 'getUser']);
        
        
    }
    
    
    public function destroy($id){
        $user = User::find($id);
        $user -> delete();
        return redirect('admin/users')->with('Done','Xóa người dùng thành công!');
        
    }
    public function destroyProduct($id) {
        $product = Product::find($id);
        $product -> delete();
        return redirect('admin/products')->with('Done','Xóa sản phẩm thành công!');
    }
    public function destroyTypeProduct($id) {
        $productType = ProductType::find($id);
        $productType -> delete();
        return redirect('admin/productType')->with('Done','Xóa loại sản phẩm thành công!');
    }
    public function postSignup(Request $req){
        $this->validate($req,
    	['email'=>'required|email|unique:users,email',
    		'password'=>'required|min:6|max:20',
    		'fullname'=>'required',
    		're_password'=>'required|same:password'
    	],
    	['email.required'=>'Vui lòng nhập email',
    	'email.email'=>'Không đúng định dạng email',
    	'email.unique'=>'Email đã có người sử  dụng',
    	'password.required'=>'Vui lòng nhập mật khẩu',
    	'repassword.same'=>'Mật khẩu không giống nhau',
    	'password.min'=>'Mật khẩu ít nhất 6 ký tự'
		]);

		$user=new User();
		$user->full_name=$req->fullname;
		$user->email=$req->email;
		$user->password=Hash::make($req->password);
		$user->phone=$req->phone;
		$user->address=$req->address;
        $user->level=3;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
		$user->save();
		return redirect()->back()->with('Done','Tạo tài khoản thành công');
    }

    public function getSearch(Request $req){
        $product = Product::where('name', 'like','%'.$req->key.'%')
        ->orWhere('unit_price', $req->key)->get();
        
        return view('page.search', compact('product'));

    }

    public function getAddToCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart -> add($product, $id);
        $req -> session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDeleteCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckOut(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

            return view('page.checkout', ['product_cart'=>$cart->items,
            'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
        }
        else{
            return view('page.checkout');
        }
    }

    public function postCheckOut(Request $request){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer -> name = $request->name;
        $customer -> gender = $request->gender;
        $customer -> email = $request->email;
        $customer -> address = $request->adress;
        $customer -> phone_number = $request->phone;
        $customer -> note = $request->note;

        $customer->save();

        $bill = new Bill;
        $bill ->id_customer = $customer->id;
        $bill -> date_order = date('Y-m-d');
        $bill -> total = $cart->totalPrice;
        $bill -> payment = $request ->payment_method;
        $bill -> note = $request ->note;

        $bill ->save();

        foreach($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail -> id_bill = $bill->id;
            $bill_detail -> id_product = $key;
            $bill_detail -> quantity = $value['qty'];
            $bill_detail -> unit_price = $value['price'] / $value['qty'];
            $bill_detail -> save();
        }
        
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    public function getSlide(){
        $slides = Slide::all();
        return view('admin.slides', compact('slides'));
    }
    public function createSlide(){
        return view('admin.addSlide');
    }
    public function addSlide(Request $request){
        $this->validate($request, 
            [
                //Kiểm tra giá trị rỗng
                'link' => 'required',
                'img'=>'mimes:jpeg,jpg,png,gif|max:10000'
            ],
            [
                //Tùy chỉnh hiển thị thông báo
                'link.required' => 'Bạn chưa nhập tên sản phẩm!',
                'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'img.max' => 'Hình thẻ giới hạn dung lượng không quá 10MB',
            ]        
        );

         //kiểm tra file tồn tại
        $name='';
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $name=time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('\image\slide'); 
            $file->move($destinationPath, $name); 
        }
        $slide = new Slide();
        $slide->link=$request->input('link');
        $slide->image=$name;
        $slide->save();
        return redirect('admin/slide')->with('success','Bạn đã thêm thành công');
    }
    public function editSlide($id){
        $slide = Slide::findOrFail($id);
        return view('admin.update_slide', compact('slide'));
    }
    public function updateSlide(Request $req, $id){
        //kiểm tra file tồn tại
        $name='';
        if($req->hasfile('img'))
        {
            $file = $req->file('img');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move('image/slide', $name); 
        }

        $slide = Slide::find($id);
        $slide->link = $req->link;
        $slide->image =$name;

        $slide -> save();
        return redirect('admin/slide')->with('success','Cập nhật thành công');
    }
    public function destroySlide($id) {
        $slide = Slide::find($id);
        $slide -> delete();
        return redirect('admin/slide')->with('Done','Xóa thành công!');
    }

    public function getBill(){
        $customer = Customer::all();
        $bills = Bill::all();
        
        return view('admin.bills', compact('bills'));
    }
}
