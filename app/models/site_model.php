<?php
class Site_model extends Model 
{	
    /**
     * Fetch all posts into db 
     */
    public function fetchAllPosts()
    {
        return $this->db->Select("SELECT * FROM `posts` WHERE `visible`='1' ORDER BY `ts` DESC");
    }
}