<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Admin Dashboard
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   .submenu {
            display: none;
        }
        .submenu.active {
            display: block;
        }
        .content {
            display: none;
        }
        .content.active {
            display: block;
        }
  </style>
  <script>
   function toggleSubmenu(id) {
            var submenu = document.getElementById(id);
            submenu.classList.toggle('active');
        }

        function showContent(id) {
            var contents = document.getElementsByClassName('content');
            for (var i = 0; i < contents.length; i++) {
                contents[i].classList.remove('active');
            }
            var content = document.getElementById(id);
            content.classList.add('active');
        }
  </script>
 </head>
 <body class="font-roboto bg-gray-100">
  <div class="flex">
   <!-- Sidebar -->
   <div class="w-64 bg-white h-screen shadow-md">
    <div class="p-6">
     <div class="text-2xl font-bold text-gray-800 mb-6">
      ampleadmin
     </div>
     <div class="sidebar-item">
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu1')">
       Quản lý thành viên
      </h3>
      <div class="submenu mb-4" id="submenu1">
       <a class="text-gray-600 hover:text-gray-800" href="../Admin/list_user.php">
        Danh sách thành viên
       </a>
      </div>
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu2')">
       Quản lý sản phẩm
      </h3>
      <div class="submenu mb-4" id="submenu2">
       <a class="text-gray-600 hover:text-gray-800" href="../Admin/list_sp.php">
        Danh sách sản phẩm
       </a>
      </div>
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu3')">
       Quản lý doanh mục
      </h3>
      <div class="submenu mb-4" id="submenu3">
       <a class="text-gray-600 hover:text-gray-800" href="../Admin/list_dm.php">
        Danh sách doanh mục
       </a>
      </div>
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu4')">
       Quản lý bình luận
      </h3>
      <div class="submenu mb-4" id="submenu4">
       <a class="text-gray-600 hover:text-gray-800" href="#">
        Danh sách bình luận
       </a>
      </div>
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu5')">
       Quản lý tin nhắn
      </h3>
      <div class="submenu mb-4" id="submenu5">
       <a class="text-gray-600 hover:text-gray-800" href="#">
        Thông tin tin nhắn
       </a>
      </div>
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu6')">
       Quản lý chữ
      </h3>
      <div class="submenu mb-4" id="submenu6">
       <a class="text-gray-600 hover:text-gray-800" href="#" onclick="showContent('content-marquee')">
        Bảng tin nhắn chạy
       </a>
      </div>
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu7')">
       Quản lý phần đơn hàng
      </h3>
      <div class="submenu mb-4" id="submenu7">
       <a class="text-gray-600 hover:text-gray-800" href="#">
        Danh sách đơn hàng đặt
       </a>
      </div>
      <h3 class="font-bold text-gray-800 mb-2 cursor-pointer" onclick="toggleSubmenu('submenu8')">
       Quản lý quảng cáo
      </h3>
      <div class="submenu mb-4" id="submenu8">
       <a class="text-gray-600 hover:text-gray-800" href="#">
        Danh sách quảng cáo
       </a>
      </div>
     </div>
    </div>
   </div>
   <!-- Main Content -->
   <div class="flex-1">
    <!-- Header -->
    <div class="flex justify-between items-center p-6 bg-white shadow-md">
     <div class="text-2xl font-bold">
      TRANG QUẢN TRỊ
     </div>
     <div class="flex items-center">
      <input class="border rounded py-1 px-3 mr-4" placeholder="Search..." type="text"/>
      <div class="flex items-center">
       <img alt="User profile picture of Steave" class="rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/E5UMPLZW5nJAA1LDMXiDnWfdXUuxC8IM4bfsaexl4EUOf1EPB.jpg" width="40"/>
       <span>
        Steave
       </span>
      </div>
     </div>
    </div>
    <!-- Marquee -->
    <div class="bg-gray-200 py-2 px-6">
     <marquee class="text-gray-600" id="user-marquee">
      Welcome to the Dashboard! Stay updated with the latest information.
     </marquee>
    </div>
    <div class="p-6">
     <!-- Content will be displayed here when a sidebar item is clicked -->
     <div class="content" id="content-marquee">
      <h3 class="text-xl font-bold mb-4">
       Quản lý chữ chạy
      </h3>
      <form id="marquee-form">
       <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="marquee-text">
         Nội dung chữ chạy
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="marquee-text" name="marquee-text" type="text" value="Welcome to the Dashboard! Stay updated with the latest information."/>
       </div>
       <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="updateMarquee()" type="button">
         Cập nhật
        </button>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
  <script>
   function updateMarquee() {
            var marqueeText = document.getElementById('marquee-text').value;
            document.getElementById('user-marquee').innerText = marqueeText;
        }
  </script>
 </body>
</html>