<?php
/*-------------------------------------------------------
1. create an html page with 4 divs
DIV 1 (class="header"):
displays the TUG logo

DIV 2 (class="navigation"):
displays a menu with 3 links separated by double colon (::)
HOME (index.php) :: PRODUCTS (products.php) :: CONTACT US (contactus.php)

DIV 3 (class="content"):
displays a heading saying HOME, then a welcome message

DIV 4 (class="footer"):
displays a copyright followed by the current year followed by a company name (TUG maybe?)
hint: the html code &copy; will display a copyright symbol
hint: the php function date('Y') will give the current year

save and run to make sure it looks right

---------------------------------------------------------
2. copy the start of your html from index.php along with the first 2 divs.
open header.php and paste what you just copied

save and run the header file (change the pulldown to "Run This File") to see what the 
header will look like
Note: this file is not a full html document, because there is no </body> or </html>
but it should still show up fine in the browser

---------------------------------------------------------
3. copy the last div and the closing html tag.
open footer.php and paste what you just copied

save and run the footer file to see what the footer will look like
(note this file is not a full html document, because it does not contain the starting
elements of an <html> document but it should still show up fine in the browser

---------------------------------------------------------
4. go back to your index.php and remove everything except the 3rd div (the one with the heading
and welcome message).

save and run to see what the new homepage looks like

---------------------------------------------------------
5. add a php tag above your div that includes the header.php file, and one below that includes
the footer.php file.
syntax: 
	include "<filename>"

save and run to once again see the completed homepage

---------------------------------------------------------
6. open products.php and put a single div that displays a heading saying PRODUCTS followed by
a list of some products

add the same php sections to include header and footer

save and run

---------------------------------------------------------
7. open contactus.php and put a single div that displays a heading saying CONTACT US followed by
some contact info

add the same php sections to include header and footer

save and run

---------------------------------------------------------
8. (optional) open css/stylesheet.css and make some changes to dress your page to your liking.

---------------------------------------------------------*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>My Page</title>
		<link rel="stylesheet" href="css/stylesheet.css">
	</head>
	<body>

		<!--START YOUR WORK HERE -->

	</body>
</html>