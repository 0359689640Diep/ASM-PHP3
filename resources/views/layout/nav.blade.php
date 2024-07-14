{{-- menu khi chưa đăng nhập --}}
<div class="container-fluid d-flex justify-content-between align-items-center border-bottom">
    <div class="d-flex justify-content-between align-items-center">
        <img style="max-width: 150px; max-height: 100px;"  src="https://fullstack.edu.vn/assets/f8-icon-lV2rGpF0.png" alt="img">
        <p class="fw-bold ms-1">Luôn hướng về tương lai</p>
    </div>

    <div class="d-flex justify-content-between align-items-center" id="navbarSupportedContent">
        <form class="d-flex" role="search">
            <input class="form-control me-2 rounded-4" style="width:400px" type="search" placeholder="Tìm kiếm theo yêu cầu của bạn" aria-label="Search">
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a href="/register"><button style="background-color: transparent; margin-right:15px" class="btn btn-light">Đăng ký</button></a>
        <a href=""><button class="btn btn-secondary">Đăng nhập</button></a>
    </div>
    
</div>
  {{-- kết thúc --}}
{{-- menu khi đã đăng nhập --}}
{{-- <style>
    .dropdown-menu-custom {
        position: absolute;
        z-index: 1000;
        top: 100%;
        right: -2%;
        display: none;
    }
    .dropdown-menu-custom.show {
        display: block;
    }
</style>
<div class="container-fluid d-flex justify-content-between align-items-center border-bottom">
    <div class="d-flex justify-content-between align-items-center">
        <img style="max-width: 150px; max-height: 100px;"  src="https://fullstack.edu.vn/assets/f8-icon-lV2rGpF0.png" alt="img">
        <p class="fw-bold ms-1">Luôn hướng về tương lai</p>
    </div>

    <div class="d-flex justify-content-between align-items-center" id="navbarSupportedContent">
        <form class="d-flex" role="search">
            <input class="form-control me-2 rounded-4" style="width:400px" type="search" placeholder="Tìm kiếm theo yêu cầu của bạn" aria-label="Search">
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center position-relative">
            <button class="btn btn-light" type="button" style="background: none" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Danh sách khóa học
            </button>
            <div class="collapse dropdown-menu-custom mt-2" id="collapseExample">
                <ul class="list-group" style="min-width: 300px">
                    <li class="list-group-item d-flex align-items-center">
                        <a href="#">
                            <img style="max-width: 100px" src="https://files.fullstack.edu.vn/f8-prod/courses/6.png" alt=""/>
                        </a>
                        <a href="#" class="ms-1 text-decoration-none">
                            <p class="mb-0 text-dark">Khóa học nodejs</p>
                            <p class="mb-1 text-dark-emphasis">10/7/2024</p>
                            <div class="progress mb-1" style="height:10px">
                                <div class="progress-bar bg-black" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <a href="#">
                            <img style="max-width: 100px" src="https://files.fullstack.edu.vn/f8-prod/courses/6.png" alt=""/>
                        </a>
                        <a href="#" class="ms-1 text-decoration-none">
                            <p class="mb-0 text-dark">Khóa học nodejs</p>
                            <p class="mb-1 text-dark-emphasis">10/7/2024</p>
                            <div class="progress mb-1" style="height:10px">
                                <div class="progress-bar bg-black" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <a href="#">
                            <img style="max-width: 100px" src="https://files.fullstack.edu.vn/f8-prod/courses/6.png" alt=""/>
                        </a>
                        <a href="#" class="ms-1 text-decoration-none">
                            <p class="mb-0 text-dark fw-bold">Khóa học nodejs</p>
                            <p class="mb-1 text-dark-emphasis fs-6">10/7/2024</p>
                            <div class="progress mb-1" style="height:10px">
                                <div class="progress-bar bg-black" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <a href="#">
                            <img style="max-width: 100px" src="https://files.fullstack.edu.vn/f8-prod/courses/6.png" alt=""/>
                        </a>
                        <a href="#" class="ms-1 text-decoration-none">
                            <p class="mb-0 text-dark">Khóa học nodejs</p>
                            <p class="mb-1 text-dark-emphasis">10/7/2024</p>
                            <div class="progress mb-1" style="height:10px">
                                <div class="progress-bar bg-black" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center position-relative">

            <img style="max-width: 70px" class="rounded-pill" src="https://files.fullstack.edu.vn/f8-prod/courses/6.png" alt="" data-bs-toggle="collapse" data-bs-target="#collapseExamplePersion" aria-expanded="false" aria-controls="collapseExamplePersion"/>

            <div class="collapse dropdown-menu-custom mt-2" id="collapseExamplePersion">
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center" style="min-width:150px">
                        <a href="#" class="text-decoration-none text-dark fs-6">
                            Trang cá nhân
                        </a>
                    </li>
                    <li class="list-group-item d-flex align-items-center" style="min-width:150px">
                        <a href="#" class="text-decoration-none text-dark fs-6">
                            Cài đặt 
                        </a>
                    </li>
                    <li class="list-group-item d-flex align-items-center" style="min-width:150px">
                        <a href="#" class="text-decoration-none text-dark fs-6">
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>   
</div> --}}
  {{-- kết thúc --}}