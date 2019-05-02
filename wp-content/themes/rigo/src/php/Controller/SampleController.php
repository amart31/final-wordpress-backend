<?php
namespace Rigo\Controller;

use Rigo\Types\Product;

class SampleController{
    
    public function getHomeData(){
        return [
            'name' => 'Rigoberto'
        ];
    }
    public function getAllProducts(){
        $query = Product::all(array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 30
            ));
        
        
        if($query->have_posts()){
            while($query->have_posts()){
                $query->the_post();  
                
        //Include the Meta Tags and Values
        $query->post->meta_keys = get_post_meta($query->post->ID);
        $query->post->image = get_field("image_01",$query->post->ID);
        
      }
    }    
        return $query->posts;
    }
    
    //get products by user
    
    //post function for users to add products
    public function createProduct($data){

        $post_arr = array(
            "post_title" => $data["post_title"],
            "post_content" => $data["post_content"],
            "post_type" => "product",
            "post_status" => "publish",
            "post_author" => get_current_user_id(),
            "meta_input" => array(
                "product_brand" => $data["product_brand"],
                "product_price" => $data["product_price"],
                "product_description" => $data["product_description"],
                "category" => $data["category"],
                "image_01" => $data["image_01"]
                ),
            
            );
            
       wp_insert_post($post_arr, $wp_error=true);

       
        return ["post added successfully"];
    }
    
    
    
}
?>