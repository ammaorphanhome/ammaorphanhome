<?php
require('fpdf.php');
require_once('TCPDF/tcpdf.php');

function generateReceipt1($insid, $name, $email, $amount, $msg, $mobile, $purpose, $today, $directory) {
    //create pdf object
    $pdf = new FPDF('P', 'mm', 'A4');
    //add new page
    $pdf->AddPage();

    //set font to arial, bold, 14pt
    $pdf->SetFont('Arial', 'B', 14);

    //Cell(width , height , text , border , end line , [align] )
    $pdf->Cell(130, 5, 'Amma Orphan Home', 0, 0);
    $pdf->Cell(59, 5, 'Donation Receipt', 0, 1);//end of line

    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(130, 5, '# 4-133, Hemachandrapuram,', 0, 0);
    $pdf->Cell(22, 5, 'Receipt No:', 0, 0);
    $pdf->Cell(37, 5, " ". $insid, 0, 1);//end of line

    $pdf->Cell(130, 5, 'Karukonda Gram Panchayat,', 0, 0);
    $pdf->Cell(11, 5, 'Date:', 0, 0);
    $pdf->Cell(37, 5, " ". date("M jS, Y", strtotime($today)), 0, 1);//end of line

    $pdf->Cell(130, 5, 'Kothagudem, Telangana, India.', 0, 1);
    $pdf->Cell(130, 5, 'Phone: +91 87907 82983', 0, 1);
    $pdf->Cell(130, 5, 'www.ammaorphanhome.org', 0, 1);

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189, 10, '', 0, 1);//end of line

    //receipt contents
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Donar Name', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "$name", 1, 1);

    //Numbers are right-aligned so we give 'R' after new line parameter
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Address', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, ' -', 1, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Email', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "$email", 1, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Phone', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "$mobile", 1, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Donation Cause', 1, 0);
    $pdf->SetFont('Arial', '', 12);

    // Donation for Amma Home
    if(!empty($purpose)){
        if($purpose == 'Donation for Amma Home'){
            if(!empty($msg)){
                $pdf->Cell(120, 5, "$msg", 1, 1);
            } else {
                $pdf->Cell(120, 5, "$purpose", 1, 1);
            }
        } else {
            $pdf->Cell(120, 5, "$purpose", 1, 1);
        }
    } else {
        $pdf->Cell(120, 5, "$msg", 1, 1);
    }

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60, 5, 'Donation Amount', 1, 0);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(120, 5, "Rs." .$amount. "/-", 1, 1);

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(180, 10, '', 0, 1);//end of line
    $pdf->Cell(180, 5, 'Thank you for your generous donation!', 1, 0, 'C');
    $pdf->Output($directory . "Donation_" .$insid. ".pdf", "F");
}

function generateReceipt($insid, $name, $email, $amount, $msg, $mobile, $purpose, $today, $directory, $src) {
    //create pdf object
    
    // create new PDF document
    $width = 165;
    $height = 65; 
    $pageLayout = array($width, $height); //  or array($height, $width)
    $pdf = new TCPDF('p', 'pt', $pageLayout, true, 'UTF-8', false);
    
    //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Narendra Sripada');
    $pdf->SetTitle('Donation Receipt');
    $pdf->SetSubject('Donation Receipt');
    $pdf->SetKeywords('Donation, PDF, Receipt');
    
    // set header and footer fonts
    
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    // set margins
    $pdf->SetMargins("20", "20", "20");
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    
    // -----------------------------------------------------
    // Donation for Amma Home
    if(!empty($purpose)) {
        if($purpose == 'Donation for Amma Home') {
            if(!empty($msg)){
                $purpose = "$msg";
            }
        }
    } else {
        $purpose = "$msg";
    }


    if($src == 'manual') {
        $src = "../img/favicon.png";
    } else {
        $src = "img/favicon.png";
    }

    // set font
    $pdf->setHeaderData('',0,'','',array(0,0,0), array(255,255,255));
    $pdf->SetFont('dejavusans', '', 10);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    
    // add a page
    $pdf->AddPage('L', 'A4');
    $html = '<table bgcolor="#C5E0FA" cellpadding="2px" width="100%">
        <tr><td><br></td></tr>
        <tr><td>
            <table border="0" cellspacing="0" cellpadding="2px">
                <tr>
                    <td width="4%" align="left"></td>
                    <td width="55%" align="left" >
                        <table border="0" cellspacing="0">
                            <tr>
                                <td width="18%"><img  style="width:70px; height:70px;" src="'.$src.'" >
                                </td>
                                <td width="82%">
                                    <h1>AMMA ORPHAN HOME </h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="35%" align="right">
                        <table border="0" cellpadding="2px">
                            <tr>
                                <td width="100%" align="right">
                                    <span style="font-size: medium">
                                    #4-133, Hemachandrapuram
                                    <br>
                                    Karukonda Gram Panchayat
                                    <br>
                                    Kothagudem, Telangana, India
                                    <br>
                                    Phone: +91 87907 82983
                                    <br>
                                    www.ammaorphanhome.org
                                    </span>
                                </td>
                            </tr>
                        </table>
                   </td>
                   <td width="6%" align="left"></td>
                </tr>
            </table>
        </td></tr>
                
        <tr><td>
            <table border="0" cellpadding="3px">
                <tr>
                    <td width="5%" align="right" valign="bottom">
                    </td>
                    <td width="24%" align="left" valign="bottom"><br><br>
                        <span style="font-size: large"><br>
                            &nbsp; Reg No: 301/2013</span>
                    </td>
                    <td width="40%" align="center">
                        <h3>DONATION RECEIPT</h3>
                    </td>
                    <td width="24%" align="right" valign="bottom"><br><br>
                        <span style="font-size: large">
                            Date: '.date("d/m/Y", strtotime($today)).' <br>
                            Receipt No: '.$insid.' </span>
                    </td>
                    <td width="6%" align="right" valign="bottom"><br><br>
                    </td>
                </tr>
            </table>
        </td>
        </tr>
                
                
        <tr>
            <td>
                <table border="0" cellpadding="1px">
                    <tr>
                        <td width="6%" align="left"></td>
                        <td width="87%" align="left">
                            <table border="0.2mm" cellpadding="3px">
                                <tr>
                                    <td width="30%" align="left">
                                        <span style="font-size: large">Full Name:</span>
                                    </td>
                                    <td width="70%" align="left">
                                        <span style="font-size: large">'.$name.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" align="left">
                                        <span style="font-size: large">Address:</span>
                                    </td>
                                    <td width="70%" align="left">
                                        <span style="font-size: large">&nbsp;&nbsp;-</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" align="left">
                                        <span style="font-size: large">Phone:</span>
                                    </td>
                                    <td width="70%" align="left">
                                        <span style="font-size: large">'.$mobile.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" align="left">
                                        <span style="font-size: large">Email:</span>
                                    </td>
                                    <td width="70%" align="left">
                                         <span style="font-size: large">'.$email.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" align="left">
                                        <span style="font-size: large">Purpose:</span>
                                    </td>
                                    <td width="70%" align="left">
                                        <span style="font-size: large">'.$purpose.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%" align="left">
                                        <span style="font-size: large">Amount:</span>
                                    </td>
                                    <td width="70%" align="left">
                                         <span style="font-size: large">Rs.'.$amount.'/-</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="7%" align="left"></td>
                    </tr>
                </table>
            </td>
        </tr>
                
                
        <tr>
            <td>
                <table border="0" cellpadding="1px">
                    <tr>
                        <td width="5%" align="left"></td>
                        <td width="95%" align="left">
                            <span style="font-size: x-small">
                                    This is an auto generated receipt and does not require any signature.
                                    <br> &nbsp;&nbsp;&nbsp;
                                    For any donation related queries, please write to us at info@ammaorhphanhome.org. Alternatively you can call or SMS @ 87907 82983.
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
                
        <tr>
            <td>
                <table border="0" cellpadding="1px">
                    <tr>
                        <td width="6%" align="left"></td>
                        <td width="87%" align="center">
                            <span style="font-size: medium">
                                 Thank you for your generosity. We appreciate your support.
                            </span>
                        </td>
                        <td width="7%" align="left"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td><br></td></tr>
        </table>';
    
    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    
    //Close and output PDF document
    $pdf->Output($directory . "Donation_" .$insid. ".pdf", "F");
    //$pdf->Output(__DIR__ . '/invoice/Donation_006.pdf', 'F');
    // $pdf->Output("C:\ammaorphanhome\cw_admin" . '\invoice\Donation_09.pdf', 'F');
}

function sendEmail($file_name, $name, $email, $directory){
    if(!empty($file_name)) {
        $file = $directory . $file_name;
        $file_size = filesize($file);
        $handle = fopen($file, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $content = chunk_split(base64_encode($content));

        $uid = md5(uniqid(time()));
        $body = " 
                <html> 
                <body>
                   <table style='border: 1px solid #06F;padding:10px;border-radius:10px;'>
                      <tr>
                          <td width='500'>
                              <div class='maindiv'>
<pre>Hi $name,

Greetings from Amma Orphan Home!

Thank you for your kind donation, Please find the attached receipt.

Your's Sincerely,
Amma Orphan Home.

If you have any questions, you may contact Teja E, President of Amma Orphan Home, at +918790782983.
</pre>
                              </div>
                          </td>
                      </tr>
                  </table>
                </body>
                </html>";

        $eol = PHP_EOL;
        // Basic headers
        $header = "From: info@ammaorphanhome.org" . $eol;
        $header .= "Bcc: nsripada7@gmail.com; dgharish@gmail.com; ammaorphanhome@gmail.com;" . $eol;
        
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"";

        // Put everything else in $message
        $message = "--" . $uid . $eol;
        $message .= "Content-Type: text/html; charset=ISO-8859-1" . $eol;
        $message .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
        $message .= $body . $eol;

        $message .= "--" . $uid . $eol;
        $message .= "Content-Type:  pdf ; name=\"" . $file_name . "\"" . $eol;
        $message .= "Content-Transfer-Encoding: base64" . $eol;
        $message .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"" . $eol;
        $message .= $content . $eol;
        $message .= "--" . $uid . "--";

        // send the mail
        if (mail($email, "Thank you for your Donation - Amma Orphan Home", $message, $header)) {
        } else {
        }
    }
}
?>
