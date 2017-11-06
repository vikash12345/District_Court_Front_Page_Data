<?
require 		'scraperwiki.php';
require 		'scraperwiki/simple_html_dom.php';
$BaseLink	=	'http://202.61.43.40:8080/';
	$SiteURL	=	'http://202.61.43.40:8080/index.php?r=site%2Fsearchbyvalue&page=0';
	sleep(5);
	$Pagination = 	file_get_html($SiteURL);
	$numberforloop = $Pagination->find("//*[@id='w0']/div/b[2]",0)->plaintext;
	$text = str_replace(',', '', $numberforloop);
//	$loop = $text/20;
$loop = 3;
	
	
	// echo $AllPages = (int)$numberforloop;
	
	
	
	//	Page pagination
	for($PageLoop = 1; $PageLoop < $loop; $PageLoop++){
	$FinalURL  		=  'http://202.61.43.40:8080/index.php?r=site%2Fsearchbyvalue&page='.$PageLoop;
		$Html		=	file_get_html($FinalURL);
		sleep(10);
		$RowNumb	=	-1;
		echo "Page No = > " . "$PageLoop.\n";
		if ($Html) {
			//	Paginate all 'View' buttons
			foreach ($Html->find("//div[@id='w0']/table[contains(@class,'table-striped')]/tbody/tr") as $element) {
				$RowNumb	+=	1;
				if ($RowNumb != 0) {
					sleep(2);
					$CourtName	=	$element->find('./td[2]', 0);
					
					
					$CaseNumbr	=	$element->find('./td[3]', 0);
					$CaseStats	=	$element->find('./td[4]', 0);
					$CaseValue	=	$element->find('./td[5]/button', 0);
					$CaseLinkR	=	$BaseLink . $CaseValue->attr['value'];
					$CaseLink	=	str_replace("amp;", "", $CaseLinkR);
          echo "$CaseLinkR\n"
					
	 }
	}}
	
	}	
			
?>
