<?php
require_once('C:/xampp/htdocs/webdoctruyen/config/database.php');

class CommentModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getCommentsByStoryId($storyId) {
        $query = "SELECT * FROM comments WHERE story_id = $storyId";
        $result = $this->db->conn->query($query);

        if ($result !== false && $result->num_rows > 0) {
            $commentsList = array();
            while ($row = $result->fetch_assoc()) {
                $commentsList[] = $row;
            }
            return $commentsList;
        } else {
            return array(); 
        }
    }
    // Trong CommentModel
    public function addComment($content, $userId, $storyId) {
        // Đảm bảo rằng $this->db đã được định nghĩa và khởi tạo đúng cách
        $query = "INSERT INTO comments (content, user_id, story_id) 
                VALUES (?, ?, ?)";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("sii", $content, $userId, $storyId);
        return $stmt->execute();
    }


    public function updateComment($id, $content) {
        $query = "UPDATE comments SET content = ? WHERE id = ?";

        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("si", $content, $id);
        return $stmt->execute();
    }

    public function deleteComment($id) {
        $query = "DELETE FROM comments WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
