<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nvh_CT_HOA_DON; 
use App\Models\nvhSanPham; 
use App\Models\nvh_HOA_DON; 
use App\Models\nvh_KHACH_HANG; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class nvh_CT_HOA_DONController extends Controller
{
   //create hoadon user

  // Controller
public function show($sanPhamId)
{
    $sanPham = nvhSanPham::find($sanPhamId);

    // Lấy Mã Khách Hàng từ session
    $userId = Session::get('nvhMaKhachHang');

    // Kiểm tra khách hàng tồn tại trong hệ thống
    $khachHang = nvh_KHACH_HANG::find($userId);

    // Truyền thông tin qua view
    return view('nvhuser.hoadon', [
        'sanPham' => $sanPham,
        'khachHang' => $khachHang, // Truyền thông tin khách hàng vào view
    ]);
}
  

  
  


   /**
    * Xử lý khi người dùng nhấn "Mua", tạo hóa đơn tự động.
    */
    public function store(Request $request)
    {
        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('nvhMaKhachHang'); // Lấy ID khách hàng từ session
    
        // Kiểm tra nếu không có khách hàng trong session
        if (!$userId) {
            return redirect()->route('nvhuser.login')->with('error', 'Vui lòng đăng nhập để tiếp tục!');
        }
    
        // Kiểm tra khách hàng tồn tại trong bảng nvh_KHACH_HANG
        $khachhang = nvh_KHACH_HANG::find($userId);
        if (!$khachhang) {
            return redirect()->route('nvhuser.login')->with('error', 'Khách hàng không tồn tại.');
        }
    
        // Lấy thông tin sản phẩm từ bảng nvhSanPham
        $sanPham = nvhSanPham::find($request->nvhSanPhamId);
        if (!$sanPham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Tạo mã hóa đơn tự động (nvhMaHoaDon)
        $nvhMaHoaDon = 'HD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); // Tạo mã hóa đơn ngẫu nhiên
    
        // Tạo hóa đơn mới với thông tin lấy từ khách hàng
        $hoaDon = nvh_HOA_DON::create([
            'nvhMaHoaDon' => $nvhMaHoaDon,
            'nvhMaKhachHang' => $khachhang->id,  // Sử dụng ID của khách hàng từ bảng nvh_KHACH_HANG
            'nvhNgayHoaDon' => Carbon::now()->toDateString(),
            'nvhNgayNhan' => Carbon::now()->addDays(3)->toDateString(),
            'nvhHoTenKhachHang' => $request->nvhHoTenKhachHang,
            'nvhEmail' => $request->nvhEmail,
            'nvhDienThoai' => $request->nvhDienThoai,
            'nvhDiaChi' => $request->nvhDiaChi,
            'nvhTongGiaTri' => $sanPham->nvhDonGia * $request->nvhSoLuong, // Tính tổng giá trị
            'nvhTrangThai' => 0, // 0 nghĩa là chưa thanh toán
        ]);
     
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('hoadon.show', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    
    
    

// xem cthoadon
public function create($hoaDonId, $sanPhamId)
{
    // Lấy thông tin hóa đơn và sản phẩm
    $hoaDon = nvh_HOA_DON::find($hoaDonId);
    $sanPham = nvhSanPham::find($sanPhamId);

    // Kiểm tra nếu hóa đơn hoặc sản phẩm không tồn tại
    if (!$hoaDon || !$sanPham) {
        return redirect()->route('hoadon.index')->with('error', 'Hóa đơn hoặc sản phẩm không tồn tại.');
    }
 // Lấy số lượng từ request
 $soLuong = request('nvhSoLuong', 1); // Số lượng mặc định là 1 nếu không có giá trị
    // Truyền dữ liệu vào view
    return view('nvhuser.cthoadon', [
        'hoaDon' => $hoaDon,
        'sanPham' => $sanPham,
        'soLuong' => $soLuong // Truyền số lượng vào view
    ]);
}


public function cthoadonshow($hoaDonId, $sanPhamId)
{
    // Lấy hóa đơn từ ID
    $hoaDon = nvh_HOA_DON::findOrFail($hoaDonId);

    // Lấy chi tiết hóa đơn từ ID
    $chiTietHoaDon = nvh_CT_HOA_DON::where('nvhHoaDonID', $hoaDonId)
                                    ->where('nvhSanPhamID', $sanPhamId)
                                    ->firstOrFail();

    // Trả về view và truyền dữ liệu
    return view('nvhuser.cthoadonshow', compact('hoaDon', 'chiTietHoaDon'));
}





    public function storecthoadon(Request $request)
    {
        // Validate các dữ liệu yêu cầu
        $validated = $request->validate([
            'nvhSanPhamID' => 'required|exists:nvhSanPham,id',
            'nvhHoaDonID' => 'required|exists:nvh_HOA_DON,id',
            'nvhSoLuong' => 'required|integer|min:1',
        ]);
    
        // Lấy thông tin sản phẩm và hóa đơn
        $sanPham = nvhSanPham::find($request->nvhSanPhamID);
        $hoaDon = nvh_HOA_DON::find($request->nvhHoaDonID);
    
        // Kiểm tra xem sản phẩm và hóa đơn có tồn tại không
        if (!$sanPham || !$hoaDon) {
            return redirect()->back()->with('error', 'Sản phẩm hoặc hóa đơn không tồn tại.');
        }
    
        // Kiểm tra xem chi tiết hóa đơn đã tồn tại chưa
        $chiTietHoaDon = nvh_CT_HOA_DON::where('nvhHoaDonID', $hoaDon->id)
                                        ->where('nvhSanPhamID', $sanPham->id)
                                        ->first();
    
        // Nếu chi tiết hóa đơn đã tồn tại, cập nhật số lượng và tính lại thành tiền
        if ($chiTietHoaDon) {
            // Cập nhật số lượng và tính lại tổng thành tiền
            $chiTietHoaDon->nvhSoLuongMua += $request->nvhSoLuong;  // Tăng số lượng
            $chiTietHoaDon->nvhThanhTien = $chiTietHoaDon->nvhSoLuongMua * $sanPham->nvhDonGia; // Tính lại thành tiền
            $chiTietHoaDon->save(); // Lưu cập nhật
        } else {
            // Nếu không tồn tại chi tiết hóa đơn, tạo mới chi tiết hóa đơn
            $nvhThanhTien = $request->nvhSoLuong * $sanPham->nvhDonGia;
    
            nvh_CT_HOA_DON::create([
                'nvhHoaDonID' => $hoaDon->id, // ID hóa đơn
                'nvhSanPhamID' => $sanPham->id, // ID sản phẩm
                'nvhSoLuongMua' => $request->nvhSoLuong, // Số lượng mua
                'nvhDonGiaMua' => $sanPham->nvhDonGia, // Đơn giá của sản phẩm
                'nvhThanhTien' => $nvhThanhTien, // Tổng thành tiền
                'nvhTrangThai' => 1,  // Trạng thái đơn hàng đã xác nhận
            ]);
        }
    
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('cthoadon.cthoadonshow', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    


    
    
    

    
  // thanh toán
 // Hiển thị sản phẩm khi nhấn vào "Mua"
 public function nvhthanhtoan($product_id)
 {
     // Lấy sản phẩm theo ID sử dụng model
     $sanPham = nvhSanPham::find($product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         abort(404, 'Sản phẩm không tồn tại');
     }

     // Trả về view với thông tin sản phẩm
     return view('nvhuser.thanhtoan', compact('sanPham'));
 }

 // Lưu thông tin thanh toán (chỉ cần lưu vào bảng thanh toán nếu cần, ở đây ta không tạo bảng ThanhToan)
 public function storeThanhtoan(Request $request)
 {
     // Lấy thông tin sản phẩm từ model SanPham
     $sanPham = nvhSanPham::find($request->product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
     }

     // Tính tổng tiền thanh toán
     $tongTien = $request->nvhSoLuong * $sanPham->nvhDonGia;

     // Nếu muốn lưu vào bảng thanh toán, bạn có thể thêm logic ở đây.
     // Nhưng ở đây chỉ cần hiển thị thông tin và tính tổng tiền.

     return view('nvhuser.thanhtoan', [
         'sanPham' => $sanPham,
         'nvhSoLuong' => $request->nvhSoLuong,
         'tongTien' => $tongTien
     ]);
 }

      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nvhList()
    {
        $nvhcthoadons = nvh_CT_HOA_DON::all();
        return view('nvhAdmin.nvhcthoadon.list',['nvhcthoadons'=>$nvhcthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nvhDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nvhcthoadon = nvh_CT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nvhAdmin.nvhcthoadon.show', ['nvhcthoadon' => $nvhcthoadon]);
    }

     // create-----------------------------------------------------------------------------------------------------------------------------------------
     public function nvhCreate()
     {
         $nvhhoadon = nvh_HOA_DON::all();
         $nvhsanpham = nvhSanPham::all();
         return view('nvhAdmin.nvhcthoadon.create',['nvhhoadon'=>$nvhhoadon,'nvhsanpham'=>$nvhsanpham]);
     }
     //post-----------------------------------------------------------------------------------------------------------------------------------------
     public function nvhCreateSubmit(Request $request)
     {
         // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
         $validate = $request->validate([
             'nvhHoaDonID' => 'required|exists:nvh_hoa_don,id',
             'nvhSanPhamID' => 'required|exists:nvhSanPham,id',
             'nvhSoLuongMua' => 'required|numeric',  
             'nvhDonGiaMua' => 'required|numeric',
             'nvhThanhTien' => 'required|numeric',  
             'nvhTrangThai' => 'required|in:0,1,2',
         ]);
     
         // Tạo một bản ghi hóa đơn mới
         $nvhcthoadon = new nvh_CT_HOA_DON;
     
         // Gán dữ liệu xác thực vào các thuộc tính của mô hình
         $nvhcthoadon->nvhHoaDonID = $request->nvhHoaDonID;
         $nvhcthoadon->nvhSanPhamID = $request->nvhSanPhamID;  
         $nvhcthoadon->nvhSoLuongMua = $request->nvhSoLuongMua;
         $nvhcthoadon->nvhDonGiaMua = $request->nvhDonGiaMua;
         $nvhcthoadon->nvhThanhTien = $request->nvhThanhTien;
         $nvhcthoadon->nvhTrangThai = $request->nvhTrangThai;
     
        
     
         // Lưu bản ghi mới vào cơ sở dữ liệu
         $nvhcthoadon->save();
     
         // Chuyển hướng đến danh sách hóa đơn
         return redirect()->route('nvhAdmin.nvhcthoadon');
     }

      // edit-----------------------------------------------------------------------------------------------------------------------------------------
      public function nvhEdit($id)
{
    $nvhhoadon = nvh_HOA_DON::all(); // Lấy tất cả các hóa đơn
    $nvhsanpham = nvhSanPham::all(); // Lấy tất cả các sản phẩm

    // Lấy chi tiết hóa đơn cần chỉnh sửa
    $nvhcthoadon = nvh_CT_HOA_DON::where('id', $id)->first();

    if (!$nvhcthoadon) {
        // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
        return redirect()->route('nvhAdmin.nvhcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
    }

    // Trả về view với dữ liệu
    return view('nvhAdmin.nvhcthoadon.edit', [
        'nvhhoadon' => $nvhhoadon,
        'nvhsanpham' => $nvhsanpham,
        'nvhcthoadon' => $nvhcthoadon
    ]);
}

      //post-----------------------------------------------------------------------------------------------------------------------------------------
      public function nvhEditSubmit(Request $request,$id)
      {
          // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
          $validate = $request->validate([
              'nvhHoaDonID' => 'required|exists:nvh_hoa_don,id',
              'nvhSanPhamID' => 'required|exists:nvhSanPham,id',
              'nvhSoLuongMua' => 'required|numeric',  
              'nvhDonGiaMua' => 'required|numeric',
              'nvhThanhTien' => 'required|numeric',  
              'nvhTrangThai' => 'required|in:0,1,2',
          ]);
         
      
          // Tạo một bản ghi hóa đơn mới
          $nvhcthoadon = nvh_CT_HOA_DON::where('id', $id)->first();
      
          // Gán dữ liệu xác thực vào các thuộc tính của mô hình
          $nvhcthoadon->nvhHoaDonID = $request->nvhHoaDonID;
          $nvhcthoadon->nvhSanPhamID = $request->nvhSanPhamID;  
          $nvhcthoadon->nvhSoLuongMua = $request->nvhSoLuongMua;
          $nvhcthoadon->nvhDonGiaMua = $request->nvhDonGiaMua;
          $nvhcthoadon->nvhThanhTien = $request->nvhThanhTien;
          $nvhcthoadon->nvhTrangThai = $request->nvhTrangThai;
      
         
      
          // Lưu bản ghi mới vào cơ sở dữ liệu
          $nvhcthoadon->save();
      
          // Chuyển hướng đến danh sách hóa đơn
          return redirect()->route('nvhadmin.nvhcthoadon');
      }

        //delete
        public function nvhDelete($id)
        {
            nvh_CT_HOA_DON::where('id',$id)->delete();
            return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
        }
     
}