<?php
if (isset($data) && $data !== []) {
  $notificationType = $data['notification']['type'];
  $notificationMessage = $data['notification']['message'];
  $notificationLink = $data['notification']['link'];
  $notificationType($notificationMessage, $notificationLink);
}
?>

<div class="container home">
  <div class="login">
    <div class="user-search">
       <div class="user-search-sub">
          <select class="select-search" name="" id="">
            <option value="">Tất cả</option>
            <option value="">Nhan đề</option>
            <option value="">Tác giả</option>
            <option value="">Chủ đề</option>
            <option value="">Năm xuất bản</option>
            <option value="">Chỉ số phân loại</option>
          </select>
          <input class="input-search" type="text" placeholder="Nhập tên sách hoặc từ khoá cần tìm ...">

<div>  
   <button id="btn-search">Tìm kiếm</button></div>
       

      </div>
    </div>
  </div>
</div>