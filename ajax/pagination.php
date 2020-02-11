<?php
include "../vendor/config.php";
session_start();
$show = 5 ;
$page = "";
$output = "";

if (isset($_POST['halaman'])=="quizku") {
    if (isset($_POST['page'])) {
        $page = $_POST['page'];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $show;
    $query = $mysqli->query("SELECT * FROM quiz WHERE id_pembuat='$_SESSION[id]' ORDER BY id DESC LIMIT $start_from,$show ");

    while ($data = $query->fetch_array()) {
        $id = $data['id'];
        $id_pembuat = $data['id_pembuat'];
        $judul = $data['judul'];
        $gambar = strtolower(str_replace(" ","-",$data['gambar']));
        $kategori = $data['kategori'];
        $tingkat = $data['tingkat'];
        $deskripsi = $data['deskripsi'];
        $output .= '
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <div class="row">';
                    $file = str_replace("ajax/","",url("images/").$gambar);
                    $file_headers = @get_headers($file);
                    if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                        $output .= '
                        <div class="col-sm-3 text-center" style="background:#C4C4C4">
                            <h3 style="line-height:250px;color:white">No Image</h3>
                        </div>';
                    } else {
                        $output .= '
                        <div class="col-sm-3 text-center">
                            <img class="img-responsive" src="'.$file.'" alt="'.$judul.'" />
                        </div>
                            ';
                    }
                    $output .= '
                    <div class="col-sm-6">
                        <h3>'.$judul.'</h3>
                        <p>'.$deskripsi.'</p>
                        <button class="btn btn-success">'.$kategori.'</button>
                    </div>
                    <div class="col-sm-3 text-center">
                        <div class="btn-group">
                            <a class="btn btn-app">
                            <i class="fas fa-edit" style="color:#007bff"></i> Edit
                            </a>
                            <a class="btn btn-app" id="delete_quiz" data-id="'.$id.'" href="javascript:void(0)">
                            <i class="fas fa-trash" style="color:#dc3545"></i> Delete
                            </a>
                        </div>
                        <div class="btn-group-vertical">
                            <a class="btn btn-app">
                            <i class="fas fa-play" style="color:#28a745"></i> Play
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    $page_query = $mysqli->query("SELECT * FROM quiz ORDER BY id DESC ");
    $jml = $page_query->num_rows;
    $total_pages = ceil($jml/$show);

    if ($page == 0) $page = 1;
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($jml/$show);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1
    $adjacents = 2;

    $output .= '<div class="pagination">';
    
    // for ($i=1; $i <= $total_pages; $i++) { 
    //     if ($page == $i) {
    //         $class = "active";
    //     } else {
    //         $class = "";
    //     }

    //     $output .= '
    //         <a page="'.$i.'" class="pagination_link '.$class.'" >'.$i.'</a>
    //     ';

    // }

    if($lastpage > 1){
        //previous button
        if ($page > 1) {
            $output.= '<a page="1" class="pagination_link " > &laquo; First </a>';
            $output.= '<a page="'.$prev.'" class="pagination_link " > < Prev </a>';
            // $output.= "<a href=\"$targetpage?page=$prev\">? previous</a>";
        }else{
            $output.= '<a page="1" class="disabled " > &laquo; First </a>';            
            $output.= '<a page="'.$page.'" class="disabled " > < Prev </a>'; 
            // $output.= "<span class=\"disabled\">? previous</span>"; 
        }
        //pages 
        if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $output.= '<a page="'.$counter.'" class="pagination_link active" >'.$counter.'</a>';
                    // $output.= "<span class=\"current\">$counter</span>";
                else
                $output.= '<a page="'.$counter.'" class="pagination_link" >'.$counter.'</a>';   
                // $output.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                         
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))     
            {
                for ($counter = 1; $counter < 2 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $output.= '<a page="'.$counter.'" class="pagination_link active" >'.$counter.'</a>';
                        // $output.= "<span class=\"current\">$counter</span>";
                    else
                        $output.= '<a page="'.$counter.'" class="pagination_link" >'.$counter.'</a>';   
                        // $output.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $output.= '<a>...</a>';   
                // $output.= "...";
                $output.= '<a page="'.$lpm1.'" class="pagination_link" >'.$lpm1.'</a>';   
                $output.= '<a page="'.$lastpage.'" class="pagination_link" >'.$lastpage.'</a>'; 
                // $output.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                // $output.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $output.= '<a page="1" class="pagination_link" >1</a>';  
                $output.= '<a page="2" class="pagination_link" >2</a>';    
                // $output.= "<a href=\"$targetpage?page=1\">1</a>";
                // $output.= "<a href=\"$targetpage?page=2\">2</a>";
                $output.= '<a>...</a>';   
                // $output.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $output.= '<a page="'.$counter.'" class="pagination_link active" >'.$counter.'</a>';
                        // $output.= "<span class=\"current\">$counter</span>";
                    else
                        $output.= '<a page="'.$counter.'" class="pagination_link" >'.$counter.'</a>';   
                        // $output.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $output.= '<a>...</a>';   
                // $output.= "...";
                $output.= '<a page="'.$lpm1.'" class="pagination_link" >'.$lpm1.'</a>';   
                $output.= '<a page="'.$lastpage.'" class="pagination_link" >'.$lastpage.'</a>'; 
                // $output.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                // $output.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $output.= '<a page="1" class="pagination_link" >1</a>';  
                $output.= '<a page="2" class="pagination_link" >2</a>';    
                // $output.= "<a href=\"$targetpage?page=1\">1</a>";
                // $output.= "<a href=\"$targetpage?page=2\">2</a>";
                $output.= '<a>...</a>';   
                // $output.= "...";
                for ($counter = $lastpage - (1 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $output.= '<a page="'.$counter.'" class="pagination_link active" >'.$counter.'</a>';
                        // $output.= "<span class=\"current\">$counter</span>";
                    else
                        $output.= '<a page="'.$counter.'" class="pagination_link" >'.$counter.'</a>';   
                        // $output.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
            }
        }

        //next button
        if ($page < $counter - 1) {
            $output.= '<a page="'.$next.'" class="pagination_link" > Next > </a>';
            $output.= '<a page="'.$total_pages.'" class="pagination_link" > Last &raquo;</a>'; 
            // $output.= "<a href=\"$targetpage?page=$next\">next</a>";
        }else{
            $output.= '<a page="'.$page.'" class="disabled " > Next > </a>'; 
            $output.= '<a page="'.$total_pages.'" class="disabled" > Last &raquo;</a>'; 
            // $output.= "<span class=\"disabled\">next</span>";
        }
    }


    $output .= '</div>';
}
echo $output;
?>