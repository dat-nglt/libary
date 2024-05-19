<?php

class userModel extends baseModel
{
  public function getAccount($taiKhoan)
  {
    $sql = "SELECT * FROM user WHERE studentCode = '$taiKhoan';";
    $query = $this->_query($sql);
    return $query;
  }

  public function changePassword($id, $newPassword)
  {
    $sql = "UPDATE `user` SET `password` = '$newPassword' WHERE `user`.`id` = $id;";
    $query = $this->_query($sql);
    return $query;
  }

  public function uploadFile($upload_url, $nhanDe, $loaiTaiLieu, $idUser)
  {
    $sql = "INSERT INTO upload(uploadURL, timeUpload, titleUpload, id_User, id_Book, id_Category) VALUES ('$upload_url', NOW(), '$nhanDe', '$idUser', Null, '$loaiTaiLieu')";
    $query = $this->_query($sql);
    return $query;
  }

  public function uploadData($idUser)
  {
    $sql = "SELECT * FROM upload LEFT JOIN category ON upload.id_Category = category.idCategory WHERE id_User = '$idUser'";
    $query = $this->_query($sql);
    return $query;
  }

  public function delUpload($idUpload)
  {
    $sql = "DELETE FROM upload WHERE idUpload = '$idUpload'";
    $query = $this->_query($sql);
    return $query;
  }

  public function getDataType()
  {
    $sql = "SELECT * FROM category";
    $query = $this->_query($sql);
    return $query;
  }

  public function getAllBook()
  {
    $sql = "SELECT * FROM book LEFT JOIN upload ON book.idBook = upload.id_Book";
    $query = $this->_query($sql);
    return $query;
  }

  public function getOneBook($id)
  {
    $sql = "SELECT book.*, upload.*, category.*
    FROM book
    LEFT JOIN upload ON book.idBook = upload.id_Book
    LEFT JOIN category ON book.id_Category = category.idCategory
    WHERE book.idBook = '$id';";
    $query = $this->_query($sql);
    return $query;
  }

  public function requestBook($idUser, $idBook)
  {
    $sql = "INSERT INTO request(dateRequest, id_User, id_Book) VALUES (NOW(), '$idUser', '$idBook')";
    $query = $this->_query($sql);
    return $query;
  }

  public function listRentBook($idUser)
  {
    $sql = "SELECT idRequest, id_User, id_Book, dateRequest, dateRental, dateReturn, book.nameBook, book.publisherBook, statusRequest FROM request,
    book, user WHERE request.id_User = user.id AND request.id_Book = book.idBook AND user.id = $idUser";
    $query = $this->_query($sql);
    return $query;
  }


}
?>