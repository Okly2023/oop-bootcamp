<?php
abstract class Content {
    protected $title;
    protected $text;

    public function __construct($title, $text){
        $this->title=$title;
        $this->text=$text;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getText(){
        return $this->text;
    }
}

class Article extends Content {
 private $Breakingnews;

 public function __contruct($title, $text, $Breakingnews){
    parent::__contruct($title, $text);
    $this->Breakingnews=$Breakingnews;
 }

 public function getTitle(){
    $title = parent::getTitle();
    if($this->$Breakingnews){
        $title = "BREAKING:" .$title;
    }
     return "<h1>" .$title ."</h1>";
    } 

 }

 class Ad extends Content{
    public function getTitle(){
        return "<h1>" . strtoupper(parent::getTitle()) . "</h1>";
    }
 }

 class vacancy extends Content{
    public function getTitle(){
    return "<h1>" . parent::getTitle() . " - apply now!" . "</h1>";
    }
 }

 $contents = [
    new Article("Article 1", "text 1"),
    new Article("Article 2", "text 2", true),
    new Ad("Ad 1", "text 1"),
    new vacancy("vacancy 1", "text 1"),
 ];

 foreach ($contents as $content) {
    echo $content->getTitle();
    echo "<p>" . $content->getText() . "</p>";
 }

?>