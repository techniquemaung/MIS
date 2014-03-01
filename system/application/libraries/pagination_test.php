<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 *** Pager for outbox page Start***
 */
class pagination{
	
	public function pager($adjacents,$start,$limit,$targetpage,$table_name,$page,$u_id)
	{
		/* 
		   First get total number of rows in data table. 
		   If you have a WHERE clause in your query, make sure you mirror it here.
		*/
//		$this->load->model('letter_model','',TRUE);
		if ($u_id==0){
			$query = "SELECT * FROM $table_name WHERE l_uni_out={$u_id}";			
		}

		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages[num];
		
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		
		/* 
			Now we apply our rules and draw the pagination object. 
			We're actually saving the code to a variable in case we want to draw it more than once.
		*/
		$pagination = "";
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?id=$u_id&page=$prev\">« previous</a>";
			else
				$pagination.= "<span class=\"disabled\">« previous</span>";	
			
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?id=$u_id&page=$counter\">$counter</a>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?id=$u_id&page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=$lastpage\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?id=$u_id&page=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=$lastpage\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=1\">1</a>";
					$pagination.= "<a href=\"$targetpage?id=$u_id&page=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?id=$u_id&page=$counter\">$counter</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?id=$u_id&page=$next\">next »</a>";
			else
				$pagination.= "<span class=\"disabled\">next »</span>";
			$pagination.= "</div>\n";	
		}
		echo $pagination;			
	}
/*
 *** Pager for outbox page End***
 */
	
	/*
 *** Pager for outbox search page Start***
 */

	
	
	
	/*
 *** Pager for outbox search page End***
 */
}
