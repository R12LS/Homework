<?php
class Comments {

    private $file = 'comments.json';

    protected function uniqid(): string {
        $symbols = "qwertyuipoasdfghjklzxcvbnm1234567890";
        $id = "";
        for ($i = 0; $i <= 10; $i++) {
            $n = rand(0, strlen($symbols));
            $id = $id . $symbols[$n];
        }

        return $id;
    }

    public function writeComment() {
        $id = uniqid();
        $comment_text = [$id => (string)readline("Введите комментарий: ")];
        $jsonEncodeData = json_encode($comment_text, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        file_put_contents($this->file, $jsonEncodeData);
    }


    public function readComment() {
        $jsonGetData = file_get_contents($this->file);
        $decodeComments = json_decode($jsonGetData, true);
        print_r($decodeComments);
    }
}

$comm = new Comments();
$comm -> writeComment();
$comm -> writeComment();
$comm -> readComment();

?>