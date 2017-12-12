<?php
    class BookRepository
    {
        public function IsTitleExist($title)
        {
            $sql = "select * from books where title = :tl";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $conn->AddParam(":tl", $title);
            $conn->Select();
            if($conn->num_rows > 0) return true;
            else return false;
        }

        public function CreateBook(Book $book)
        {
            if($this->IsTitleExist($book->title))
            {
                return 0;
            }

            $ut = new Utility();
            $sql = "INSERT INTO books
          (title, isbn, image_url, author, category, publisher, publish_year, info)
           VALUES(:title, :isbn, :image_url, :author, :category, :publisher, :publish_year, :info)";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $conn->AddParam(":title", $book->title);
            $conn->AddParam(":isbn", $book->isbn);
            $conn->AddParam(":image_url", $book->image_url);
            $conn->AddParam(":author", $book->author);
            $conn->AddParam(":category", $book->category);
            $conn->AddParam(":publisher", $book->publisher);
            $conn->AddParam(":publish_year", $ut->DateDB());
            $conn->AddParam(":info", $book->info);
            $id = $conn->Insert();
            return $id;
        }

        public function EditBook(Book $book)
        {
            $ut = new Utility();
            $sql = "UPDATE books SET
            title = :title, isbn = :isbn, image_url = :image_url, author = :author,
            category = :category, publisher = :publisher, publish_year = :publish_year, info = :info
            WHERE id = :bookid";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $conn->AddParam(":title", $book->title);
            $conn->AddParam(":isbn", $book->isbn);
            $conn->AddParam(":image_url", $book->image_url);
            $conn->AddParam(":author", $book->author);
            $conn->AddParam(":category", $book->category);
            $conn->AddParam(":publisher", $book->publisher);
            $conn->AddParam(":publish_year", $ut->DateDB());
            $conn->AddParam(":info", $book->info);
            $conn->AddParam(":bookid", $book->id);
            $id = $conn->Update();
            //var_dump($id);
            return $id;
        }

        public function GetAllBooks()
        {
            $sql = "Select * from books order by title";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $rows = $conn->Select();
            if($conn->num_rows <= 0) return null;

            $books = array();
            for($i = 0; $i < count($rows); $i++)
            {
                $book = new Book();
                $book->Set($rows[$i]);
                $books[] = $book;
            }
            return $books;
        }

        public function GetBookById($id)
        {
            $sql = "select * from books where id = :id";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $conn->AddParam(":id", $id);
            $row = $conn->Select();
            if($conn->num_rows <= 0) return null;
            $books = new Book();
            $books->Set($row[0]);
            return $books;
        }

        public function GetBookByTitle($title)
        {
            $sql = "select * from books where title = :tl";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $conn->AddParam(":tl", $title);
            $row = $conn->Select();
            if($conn->num_rows <= 0) return null;
            $book = new Book();
            $book->Set($row[0]);
            return $book;
        }

        public function SearchBook($title)
        {
            $sql = "select * from books WHERE title LIKE concat('%',:tl,'%') ";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $conn->AddParam(":tl", $title);
            $rows = $conn->Select();
            if($conn->num_rows <= 0) return null;
            $books = array();
            for($i = 0; $i < count($rows); $i++)
            {
                $book = new Book();
                $book->Set($rows[$i]);
                $books[] = $book;
            }
            return $books;
        }

        public function DeleteBook($id)
        {
            $sql = "delete from books WHERE id = :id";
            $conn = new Connect();
            $conn->SetSQL($sql);
            $conn->AddParam(":id", $id);
            $rows = $conn->Delete();
            return $rows;
        }
    }
?>