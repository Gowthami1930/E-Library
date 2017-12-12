<?php
    class BookController {

        public function Add_Book(Book $book)
        {
            $ut = new Utility();
            $nt = new Notice();

            if($book->uploaded_image['error'] == 0 && $book->uploaded_image['size'] > 0)
            {
                $tmp_file = $book->uploaded_image['tmp_name'];
                $ext = strtolower(pathinfo($book->uploaded_image['name'], PATHINFO_EXTENSION));

                if(!$ut->ValidateFileUploadSize($book->uploaded_image['size']))
                {
                    $nt->type = "danger";
                    $nt->message ="Invalid Image file: Too Large";
                    return $nt;
                }

                if(!$ut->ValidateFileUpload($ext))
                {
                    $nt->type = "danger";
                    $nt->message ="Invalid Image file: Upload JPG or PNG Only";
                    return $nt;
                }

                $target_file = $ut->DateString() . '_'. $book->id .'.'. $ext;

                $file_path = BOOK_PIC_PATH . $target_file;

                if(move_uploaded_file($tmp_file,$file_path))
                {
                    if($book->image_url != BOOK_PIC_DEFAULT) {
                        unlink(BOOK_PIC_DEFAULT . $book->image_url);
                    }
                    $book->image_url = $target_file;
                }
                else
                {
                    $nt->type = "danger";
                    $nt->message ="File could not be uploaded";
                    return $nt;
                }
            }


            if(!$ut->ValidateTitle($book->title))
            {
                $nt->type = "danger";
                $nt->message ="Title field required";
                return $nt;
            }

            if(!$ut->ValidateISBN($book->isbn))
            {
                $nt->type = "danger";
                $nt->message ="invalid ISBN";
                return $nt;
            }

            /*if(!$ut->ValidateImageUrl($book->image_url))
            {
                $nt->type = "danger";
                $nt->message ="image_url required";
                return $nt;
            }*/

            if(!$ut->ValidateAuthor($book->author))
            {
                $nt->type = "danger";
                $nt->message ="invalid Author";
                return $nt;
            }

            if(!$ut->ValidateCategory($book->category))
            {
                $nt->type = "danger";
                $nt->message ="Invalid category";
                return $nt;
            }

            if(!$ut->ValidatePublisher($book->publisher))
            {
                $nt->type = "danger";
                $nt->message ="invalid publisher";
                return $nt;
            }

            if(!$ut->ValidateYear($book->publish_year))
            {
                $nt->type = "danger";
                $nt->message ="invalid year";
                return $nt;
            }

            if(!$ut->ValidateInfo($book->info))
            {
                $nt->type = "danger";
                $nt->message ="Pls Provide Book Info";
                return $nt;
            }

            $brp = new BookRepository();
            $id = $brp->CreateBook($book);
            if($id <= 0)
            {
                $nt->type = "danger";
                $nt->message ="Book Already Exists";
                return $nt;
            }

            $book->id = $id;

            $nt->type = "success";
            $nt->message = "The book, " . $book->title ." has been Added Successfully";
            return $nt;
        }

        public function Edit_book(Book $book)
        {
            $ut = new Utility();
            $nt = new Notice();

            if($book->uploaded_image['error'] == 0 && $book->uploaded_image['size'] > 0)
            {
                $tmp_file = $book->uploaded_image['tmp_name'];
                $ext = strtolower(pathinfo($book->uploaded_image['name'], PATHINFO_EXTENSION));

                if(!$ut->ValidateFileUploadSize($book->uploaded_image['size']))
                {
                    $nt->type = "danger";
                    $nt->message ="Invalid Image file: Too Large";
                    return $nt;
                }

                if(!$ut->ValidateFileUpload($ext))
                {
                    $nt->type = "danger";
                    $nt->message ="Invalid Image file: Upload JPG or PNG Only";
                    return $nt;
                }

                $target_file = $ut->DateString() . '_'. $book->id .'.'. $ext;

                $file_path = BOOK_PIC_PATH . $target_file;


                if(move_uploaded_file($tmp_file,$file_path))
                {
                    if($book->image_url != BOOK_PIC_DEFAULT) {
                        unlink(BOOK_PIC_DEFAULT . $book->image_url);
                    }
                    $book->image_url = $target_file;

                }
                else
                {
                    $nt->type = "danger";
                    $nt->message ="File could not be uploaded";
                    return $nt;
                }
            }


            if(!$ut->ValidateTitle($book->title))
            {
                $nt->type = "danger";
                $nt->message ="Title field required";
                return $nt;
            }

            if(!$ut->ValidateISBN($book->isbn))
            {
                $nt->type = "danger";
                $nt->message ="invalid ISBN";
                return $nt;
            }

            /*if(!$ut->ValidateImageUrl($book->image_url))
            {
                $nt->type = "danger";
                $nt->message ="image_url required";
                return $nt;
            }*/

            if(!$ut->ValidateAuthor($book->author))
            {
                $nt->type = "danger";
                $nt->message ="invalid Author";
                return $nt;
            }

            if(!$ut->ValidateCategory($book->category))
            {
                $nt->type = "danger";
                $nt->message ="Invalid category";
                return $nt;
            }

            if(!$ut->ValidatePublisher($book->publisher))
            {
                $nt->type = "danger";
                $nt->message ="invalid publisher";
                return $nt;
            }

            if(!$ut->ValidateYear($book->publish_year))
            {
                $nt->type = "danger";
                $nt->message ="invalid year";
                return $nt;
            }

            if(!$ut->ValidateInfo($book->info))
            {
                $nt->type = "danger";
                $nt->message ="Pls Provide Book Info";
                return $nt;
            }

            $brp = new BookRepository();
            $id = $brp->EditBook($book);
            if($id <= 0)
            {
                $nt->type = "danger";
                $nt->message ="Book was not updated";
                return $nt;
            }

            $nt->type = "success";
            $nt->message = "The book, " . $book->title ." has been updated Successfully";
            return $nt;
        }

    }

?>