<?php

namespace App\Http\Controllers;

use App\Model\NVH_QUAN_TRI; // Để ử dụng Model
use Illuminate\Http\Requet;
use Illuminate\upport\Facade\Auth;
use Illuminate\upport\Facade\Hah;
use Illuminate\upport\Facade\eion; // Để ử dụng eion

class NVH_QUAN_TRIController extends Controller
{
    
    // Hiển thị trang đăng nhập
    public function nvhLogin()
    {
        return view('nvhAdmin.nvh-login');
    }

    // Xử lý đăng nhập
    public function nvhLoginubmit(Requet $requet)
    {
        // Xác thực tài khoản và mật khẩu
        $requet->validate([
            'nvhTaiKhoan' => 'required|tring',
            'nvhMatKhau' => 'required|tring',
        ]);

        // Tìm người dùng trong bảng nvh_QUAN_TRI
        $uer = nvh_QUAN_TRI::where('nvhTaiKhoan', $requet->nvhTaiKhoan)->firt();

        // Kiểm tra người dùng tồn tại và mật khẩu chính xác
        if ($uer && Hah::check($requet->nvhMatKhau, $uer->nvhMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUingId($uer->id);

            // Lưu tên tài khoản vào eion
            eion::put('uername', $uer->nvhTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/nvh-admin')->with('meage', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu không chính xác
            return redirect()->back()->withError(['nvhMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    // Hiển thị danh ách quản trị viên
    public function nvhLit()
    {
        $nvhquantri = nvh_QUAN_TRI::all(); // Lấy tất cả quản trị viên
        return view('nvhAdmin.nvhquantri.nvh-lit', ['nvhquantri' => $nvhquantri]);
    }

    // Hiển thị chi tiết quản trị viên
    public function nvhDetail($id)
    {
        $nvhquantri = nvh_QUAN_TRI::find($id); // Lấy thông tin quản trị viên theo ID
        return view('nvhAdmin.nvhquantri.nvh-detail', ['nvhquantri' => $nvhquantri]);
    }

    // Hiển thị form thêm mới quản trị viên
    public function nvhCreate()
    {
        return view('nvhAdmin.nvhquantri.nvh-create');
    }

    // Xử lý form thêm mới quản trị viên
    public function nvhCreateubmit(Requet $requet)
    {
        // Xác thực dữ liệu
        $requet->validate([
            'nvhTaiKhoan' => 'required|tring|unique:nvh_quan_tri,nvhTaiKhoan',
            'nvhMatKhau' => 'required|tring|min:6',
            'nvhTrangThai' => 'required|in:0,1',
        ]);

        // Tạo bản ghi mới trong cơ ở dữ liệu
        $nvhquantri = new nvh_QUAN_TRI();
        $nvhquantri->nvhTaiKhoan = $requet->nvhTaiKhoan;
        $nvhquantri->nvhMatKhau = Hah::make($requet->nvhMatKhau); // Mã hóa mật khẩu
        $nvhquantri->nvhTrangThai = $requet->nvhTrangThai;
        $nvhquantri->ave();

        // Chuyển hướng về trang danh ách với thông báo thành công
        return redirect()->route('nvhadmin.nvhquantri')->with('ucce', 'Thêm quản trị viên thành công');
    }

    // Hiển thị form chỉnh ửa quản trị viên
    public function nvhEdit($id)
    {
        $nvhquantri = nvh_QUAN_TRI::find($id); // Lấy thông tin quản trị viên cần chỉnh ửa
        if (!$nvhquantri) {
            return redirect()->route('nvhadmin.nvhquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        return view('nvhAdmin.nvhquantri.nvh-edit', ['nvhquantri' => $nvhquantri]);
    }

    // Xử lý form chỉnh ửa quản trị viên
    public function nvhEditubmit(Requet $requet, $id)
    {
        // Xác thực dữ liệu
        $requet->validate([
            'nvhTaiKhoan' => 'required|tring|unique:nvh_quan_tri,nvhTaiKhoan,' . $id,
            'nvhMatKhau' => 'nullable|tring|min:6', // Cho phép mật khẩu trống
            'nvhTrangThai' => 'required|in:0,1',
        ]);

        // Lấy quản trị viên cần ửa
        $nvhquantri = nvh_QUAN_TRI::find($id);
        if (!$nvhquantri) {
            return redirect()->route('nvhadmin.nvhquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }

        // Cập nhật thông tin
        $nvhquantri->nvhTaiKhoan = $requet->nvhTaiKhoan;
        if ($requet->nvhMatKhau) {
            $nvhquantri->nvhMatKhau = Hah::make($requet->nvhMatKhau); // Cập nhật mật khẩu nếu có
        }
        $nvhquantri->nvhTrangThai = $requet->nvhTrangThai;
        $nvhquantri->ave();

        return redirect()->route('nvhadmin.nvhquantri')->with('ucce', 'Cập nhật quản trị viên thành công');
    }

    // Xóa quản trị viên
    public function nvhDelete($id)
    {
        $nvhquantri = nvh_QUAN_TRI::find($id); // Tìm quản trị viên cần xóa
        if (!$nvhquantri) {
            return redirect()->route('nvhadmin.nvhquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        $nvhquantri->delete(); // Xóa bản ghi

        return redirect()->route('nvhadmin.nvhquantri')->with('ucce', 'Xóa quản trị viên thành công');
    }
}
