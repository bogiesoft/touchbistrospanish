<?php
class Search
{
    
    public $infinite = -1;
    public $queryBase =  "SELECT ID
                         FROM wp_posts
                         WHERE (post_type = 'st_article' OR post_type = 'st_video')
                         AND post_status = 'publish'";
    
    
    public function SearchSentence(array $args)
    {
        $sentence = $args['sentence'];
        $numPost = $args['numMaxPost'];
        $numMaxPost = $args['numMaxPost'];
        $arrayTemp = array();
        
        /*First Phase Search on Titles Exact Match*/
        $postIDs = $this->TitleExactMatch($sentence, $numPost);
        $numPost = count($postIDs);
        if ( $numPost >= $numMaxPost && $numMaxPost != $this->infinite )
        {
            return $postIDs;
        }
        
        /*Second Phase Search on Comtent Exact Match*/
        $numPost = ($numMaxPost != $this->infinite) ? $numMaxPost - $numPost : $this->infinite;
        $arrayTemp = $this->ContentExactMatch($sentence, $numPost);
        $postIDs = $this->ArrayMergeKeepKeys($postIDs, $arrayTemp);
        $postIDs = array_unique($postIDs);
        $numPost = count($postIDs);
        if ( $numPost >= $numMaxPost && $numMaxPost != $this->infinite )
        {
            return $postIDs;
        }
        
        /*Third Phase Search on Title Partial Match*/
        $numPost = ($numMaxPost != $this->infinite) ? $numMaxPost - $numPost : $this->infinite;
        $arrayTemp = $this->TitlePartialMatch($sentence, $numPost);
        $postIDs = $this->ArrayMergeKeepKeys($postIDs, $arrayTemp);
        $postIDs = array_unique($postIDs);
        $numPost = count($postIDs);
        
        if ( $numPost >= $numMaxPost && $numMaxPost != $this->infinite )
        {
            return $postIDs;
        }
        
        /*Fourth Phase Search on Content Partial Match*/
        $numPost = ($numMaxPost != $this->infinite) ? $numMaxPost - $numPost : $this->infinite;
        $arrayTemp = $this->ContentPartialMatch($sentence, $numPost);
        $postIDs = $this->ArrayMergeKeepKeys($postIDs, $arrayTemp);
        $postIDs = array_unique($postIDs);
        
        return $postIDs;
    }

    /*=============>> Function Search by Title Exact Match <<=============*/
    protected function TitleExactMatch()
    {
        $args = func_get_args();
        $sentence = $args[0];
        $maxResults = $args[1];
        
        global $wpdb;
        
        $querystr = $this->queryBase . " AND post_title LIKE '%". $sentence ."%' 
        ORDER BY post_title ASC ";
        
        if($maxResults != $this->infinite)
        {
            $querystr = $querystr . "LIMIT " . $maxResults;
        }
        
        $pageposts = $wpdb->get_results($querystr, OBJECT);
        
        $postIDs = array();
        
        foreach ($pageposts as $post) {
            array_push($postIDs, $post->ID);
        }
        
        return array_unique($postIDs);
        
    }
    
    /*=============>> Function Search by Content Exact Match <<=============*/
    protected function ContentExactMatch()
    {
        $args = func_get_args();
        $sentence = $args[0];
        $maxResults = $args[1];
        
        global $wpdb;
        
        $querystr = $this->queryBase . " AND post_content LIKE '%". $sentence ."%' 
        ORDER BY post_content ASC ";
        
        if($maxResults != $this->infinite)
        {
            $querystr = $querystr . "LIMIT " . $maxResults;
        }
        
        $pageposts = $wpdb->get_results($querystr, OBJECT);
        
        $postIDs = array();
        
        foreach ($pageposts as $post) {
            array_push($postIDs, $post->ID);
        }
        
        return array_unique($postIDs);
        
    }
    
    /*=============>> Function Search by Title Partial Match <<=============*/
    protected function TitlePartialMatch()
    {
        $args = func_get_args();
        
        $termString = $args[0];
        $maxResults = $args[1];
        
        $searchStatements = "";
        $selectStatements = "";
        $otherStatement = "";
        $otherStatement2 = "";
        
        global $wpdb;
    
        $terms = explode(" ", $termString);

        foreach ($terms as $term) {
            if ( strlen ( $term ) > 2 )
            {
                $searchStatements = $searchStatements . $otherStatement . " post_title LIKE '%". trim($term) ."%' ";
                $selectStatements = $selectStatements . $otherStatement2 . "(CASE WHEN post_title LIKE '%". trim($term) ."%' THEN 1 ELSE 0 END) ";
                $otherStatement = "OR";
                $otherStatement2 = "+";
            }
        }

        $querystr = "SELECT ID, "." (". $selectStatements . ") AS relevance " .
                    "FROM wp_posts
                     WHERE (post_type = 'st_article' OR post_type = 'st_video')
                     AND post_status = 'publish' 
                     AND (". $searchStatements .") 
                    ORDER BY relevance DESC, post_title ASC ";
        
        if($maxResults != $this->infinite)
        {
            $querystr = $querystr . "LIMIT " . $maxResults;
        }
        
        $pageposts = $wpdb->get_results($querystr, OBJECT);

        $postIDs = array();
        foreach ($pageposts as $post) {
            array_push($postIDs, $post->ID);
        }
        
        return array_unique($postIDs);
    }
    
    /*=============>> Function Search by Content Partial Match <<=============*/
    protected function ContentPartialMatch()
    {
        $args = func_get_args();

        $termString = $args[0];
        $maxResults = $args[1];
        
        $searchStatements = "";
        $selectStatements = "";
        $otherStatement = "";
        $otherStatement2 = "";
        
        global $wpdb;
    
        $terms = explode(" ", $termString);

        foreach ($terms as $term) {
            if ( strlen ( $term ) > 2 )
            {
                $searchStatements = $searchStatements . $otherStatement . " post_content LIKE '%". trim($term) ."%' ";
                $selectStatements = $selectStatements . $otherStatement2 . "(CASE WHEN post_content LIKE '%". trim($term) ."%' THEN 1 ELSE 0 END) ";
                $otherStatement = "OR";
                $otherStatement2 = "+";
            }
        }

        $querystr = "SELECT ID, "." (". $selectStatements . ") AS relevance " .
                    "FROM wp_posts
                     WHERE (post_type = 'st_article' OR post_type = 'st_video')
                     AND post_status = 'publish' 
                     AND (". $searchStatements .") 
                    ORDER BY relevance DESC, post_content ASC ";
        
        if($maxResults != $this->infinite)
        {
            $querystr = $querystr . "LIMIT " . $maxResults;
        }
        
        $pageposts = $wpdb->get_results($querystr, OBJECT);

        $postIDs = array();
        foreach ($pageposts as $post) {
            array_push($postIDs, $post->ID);
        }
        
        return array_unique($postIDs);
    }
    
    /*=============>> Function Merch Arrays Keeping the Order <<=============*/
    protected function ArrayMergeKeepKeys() {
          
        $args = func_get_args();
        $a = $args[0];
        $b = $args[1];
        
        if($a == null)
        {
            return $b;
        }
        
        if($b == null)
        {
            return $a;
        }
        
        foreach($b as $arg){
            array_push($a, $arg);
        }
        
        return $a;
    }
}
?>