<?php
    class Book
    {
        public $id;
        public $title;
        public $isbn;
        public $image_url;
        public $author;
        public $category;
        public $publisher;
        public $publish_year;
        public $info;
        public $uploaded_image;
        
        function __construct()
        {
            $this->id = '';
            $this->title = '';
            $this->isbn = '';
            //$this->image_url = '';
            $this->author = '';
            $this->category = '';
            $this->publisher = '';
            $this->publish_year = '';
            $this->info = '';
        }


        public function Set($row)
        {
            $this->id = $row["id"];
            $this->title = $row["title"];
            $this->isbn = $row["isbn"];
            $this->author = $row["author"];
            $this->category = $row["category"];
            $this->publisher = $row["publisher"];
            $this->publish_year = $row["publish_year"];
            $this->info = $row["info"];
            $this->image_url = $row["image_url"];

            if($this->image_url == "")
            {
                $this->image_url = BOOK_PIC_DEFAULT;
            }
        }
    }
?>