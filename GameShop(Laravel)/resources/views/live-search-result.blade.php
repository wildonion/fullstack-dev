<?php // it will echo a table only!
if(!empty($posts)){ 
    $count = 1;
    $outputhead = '';
    $outputbody = '';  
    $outputtail ='';

    $outputhead .= '<div class="container">
    			 <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';
                  
    foreach ($posts as $post){   
    $body = mb_substr(strip_tags($post->description),0,50)."...";
    $show = url('blog/'.$post->id.'/'. $post->title);
    $outputbody .=  ' 
                
                            <tr> 
		                        <td>'.$count++.'</td>
		                        <td>'.str_replace('-', ' ', $post->title).'</td>
		                        <td dir="rtl">'.$body.'</td>
                                <td><a href="'.$show.'" target="_blank" title="SHOW" ><span class="glyphicon glyphicon-list"></span></a></td>
                            </tr> 
                    ';
                
    }  

    $outputtail .= ' 
                        </tbody>
                    </table>
                  </div>
                </div>';
         
    echo $outputhead; 
    echo $outputbody; 
    echo $outputtail; 
 }  
 
 else{  
    echo 'Post Not Found';  
  } 
 
 ?>