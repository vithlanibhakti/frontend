<form action="subscribe.php" method="post">
<div class="footer-container">
    <div class="footer-links">
        <div class="col-md-10 col-12 offset-md-1">
            <div class="m-0 align-items-center row">
                <div class="footer-link-top-row-item col-lg-2 col-md-3 col-12"><img class="img-fluid" src="img/websitelogo.png"></div>
                <div class="footer-link-top-row-item col">
                    

                <input id="subscribeMail" name="subscribeMail" placeholder="Enter your email to subscribe to our newsletter" type="text" class="form-control" aria-describedby="UserNameHelpBlock" >

                <button id="buttonDesign" class="new-btn  
  new-btn-primary float-right btn-append-with-text-box " type="submit" name="submit">Submit</button>

                <!-- <button id="buttonDesign" class="new-btn  
  new-btn-primary float-right btn-append-with-text-box " type="button"> Submit</button> -->

</div>
                <div class="footer-link-top-row-item footer-link-social-link-holder pr-0 d-flex justify-content-end col-lg-auto col-md-12 col-sm-12 col-12">
                    <div class="social-link-without-design">
                    <a href="https://www.facebook.com/gitlankasmart/" target="_blank">
                        <div class="footer-link-social-link"><i class="fab fa-facebook-f"></i></div>
                        </a>
                        <a href="https://www.facebook.com/gitlankasmart/" target="_blank"> 
                        <div class="footer-link-social-link"><i class="fab fa-twitter"></i></div>
                         </a>
                        <a href="https://www.facebook.com/gitlankasmart/" target="_blank">
                        <div class="footer-link-social-link"><i class="fab fa-youtube"></i></div>
                         </a>
                    </div>
                </div>
                <div class="footer-link-top-row-item footer-link-social-link-holder col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="social-link-design">
                         <a href="https://www.facebook.com/gitlankasmart/" target="_blank"> 
                        <div class="footer-link-social-link"><i class="fab fa-facebook-f"></i></div>
                         </a>
                        <a href="https://www.facebook.com/gitlankasmart/" target="_blank"> 
                        <div class="footer-link-social-link"><i class="fab fa-twitter"></i></div>
                        </a>
                        <a href="https://www.facebook.com/gitlankasmart/" target="_blank"> 
                        <div class="footer-link-social-link"><i class="fab fa-youtube"></i></div>
                         </a> 
                    </div>
                </div>
            </div>
            <div class="m-0 row-cols-2 row-cols-xs-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 align-items-top row">
                <div class="footer-link-holder footer-link-holder-main col-lg-4 col-md-12 col-12">
                    <div>Geo Info Tech Lanka (Pvt) Ltd.<br>#9A, Kumbukgaha Pokuna Road, Nugegoda, Sri Lanka.</div><br>

                    <div class="footer-phone-number-holder"><i class="fas fa-phone"></i>+94 7777 02275</div>
                    <div>(Daily operating hours 8.00a.m to 8.00p.m)</div>
                </div>
                <div class="accordianTab col-lg-12 col-md-12 col-12">
                    <div class="tabs footer-link-holder">
                        <div class="tab"><input type="radio" id="rd1" name="rd" class="rd"><label class="footer-link-heading tab-label" for="rd1">Quick Links</label>
                            <div class="tab-content">
                             <a href="home.php">   <div class="footer-link-item">Home</div></a>
                             <a href="qty.php">     <div class="footer-link-item">Catalogue &amp; Deals</div> </a>a>
                             <a href="utilityPayment.php">   <div class="footer-link-item">Utility bill payments</div></a>
                             <a href="trackorderprofile.php">   <div class="footer-link-item">Track my order</div></a>
                            </div>
                        </div>
                        <div class="tab"><input type="radio" id="rd2" name="rd" class="rd"><label class="footer-link-heading tab-label" for="rd2">Categories</label>
                            <div class="tab-content">
                                <div class="footer-link-item">Grocery</div>
                                <div class="footer-link-item">Beverages</div>
                                <div class="footer-link-item">Household</div>
                                <div class="footer-link-item">Vegetables</div>
                                <div class="footer-link-item">Fruits</div>
                            </div>
                        </div>
                        <div class="tab"><input type="radio" id="rd3" name="rd" class="rd"><label class="footer-link-heading tab-label" for="rd3">Useful Links</label>
                            <div class="tab-content">
                                <a href="privacy.php">   <div class="footer-link-item">Privacy Policy</div></a>
                                <div class="footer-link-item">FAQ</div>
                                <div class="footer-link-item">Terms and Conditions</div>
                                <a href="storelocator.php">   <div class="footer-link-item">Stores</div></a>
                                <div class="footer-link-item">Delivery grid</div>
                            </div>
                        </div>
                        <div class="tab"><input type="radio" id="rd4" name="rd" class="rd"><label class="footer-link-heading tab-label" for="rd4">Customer Service</label>
                            <div class="tab-content">
                                <a href="contactus.php">   <div class="footer-link-item">Contact us</div></a>
                                <!-- <a href="aboutus.php">   <div class="footer-link-item">About us </div></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-link-holder footer-link-holder-sub col-lg-2 col-md-3 col-12">
                    <div class="footer-link-heading">Quick Links</div>
                    <a href="home.php">   <div class="footer-link-item">Home</div></a>
                             <a href="qty.php">     <div class="footer-link-item">Catalogue &amp; Deals</div> </a>
                             <a href="utilityPayment.php">   <div class="footer-link-item">Utility bill payments</div></a>
                             <a href="trackorderprofile.php">   <div class="footer-link-item">Track my order</div></a>
                </div>
                <div class="footer-link-holder footer-link-holder-sub col-lg-2 col-12">
                    <div class="footer-link-heading">Categories</div>
                    <?php
                    $count=0;
                    $image=[];
                    
                    $c=0;
                    $id=[];
include 'config.php';
$result = mysqli_query($con,"SELECT category_name,category_id FROM categorys LIMIT 5;");
			while($row = mysqli_fetch_array($result)) {
            $img= $row['category_name'];
            $idc= $row['category_id'];
            //echo $idc;
$image[$count]=$img;
$count = $count +1;

$id[$c]=$idc;
$c = $c +1;

                        }
                        $image0= $image[0];
                        $image1= $image[1];
                        $image2= $image[2];
                        $image3= $image[3];
                        $image4= $image[4];
                        

                        $id0= $id[0];
                        $id1= $id[1];
                        $id2= $id[2];
                        $id3= $id[3];
                        $id4= $id[4];
                                    ?>
                    <a href='qtydynamic.php?id=<?php echo $id0;?>'> <div class="footer-link-item"><?php echo $image0; ?></div></a>
                    <a href='qtydynamic.php?id=<?php echo $id1;?>'> <div class="footer-link-item"><?php echo $image1; ?></div></a>
                    <a href='qtydynamic.php?id=<?php echo $id2;?>'> <div class="footer-link-item"><?php echo $image2; ?></div></a>
                    <a href='qtydynamic.php?id=<?php echo $id3;?>'> <div class="footer-link-item"><?php echo $image3; ?></div></a>
                    <a href='qtydynamic.php?id=<?php echo $id4;?>'> <div class="footer-link-item"><?php echo $image4; ?></div></a>
                    <!-- <div class="footer-link-item">Household</div>
                    <div class="footer-link-item">Vegetables</div>
                    <div class="footer-link-item">Fruits</div> -->
                </div>
                <div class="footer-link-holder footer-link-holder-sub col-lg-2 col-12">
                <a href="privacy.php"> 
                      <div class="footer-link-item">Privacy Policy</div></a>
                                <div class="footer-link-item">FAQ</div>
                                <div class="footer-link-item">Terms and Conditions</div>
                                <a href="storelocator.php">   <div class="footer-link-item">Stores</div></a>
                                <div class="footer-link-item">Delivery grid</div>
                </div>
                <div class="footer-link-holder footer-link-holder-sub col-lg-2 col-12">
                    <div class="footer-link-heading">Customer Service</div>
                    <a href="contactus.php">   <div class="footer-link-item">Contact us</div></a>
                                <a href="aboutus.php">   <div class="footer-link-item">About us </div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="col-md-10 col-12 offset-md-1">
            <div class="m-0 align-items-center row">
                <div class="col-lg-auto col-md-12 col-12">Copyright © Geo info Tech Lanka (Pvt) Ltd. All Rights Reserved</div>
                <div class="ml-auto footer-payment-method-holder col-lg-auto col-md-12 col-12"><img class="img-fluid footer-payment-method-image" src="data:image/png;base64,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">
                    <img class="img-fluid footer-payment-method-image" src="data:image/png;base64,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">
                    <img class="img-fluid footer-payment-method-image" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAAiCAYAAAAKyxrjAAAAAXNSR0IArs4c6QAADpdJREFUWAmlWHuMXFUZ/92ZOzP7mN2d3e6z3UIRrEILIrQqlPIQgpogilE0EKOBAAlggBghKhjlDxMSMcYYn0Q0ipJUxBQUhAoSqDwCFEpJn+u23T62+37M+3X9/b5z78wu4D96dufec77vO9/7+86Z8cDx5pHp4dl6y80nSrFr89VgOKgHMY/wIPDgeQH40IprURNmOFsIQLQgog/gcadhNBel9pOPo9bT8bIN9nD83DrCR6uQRySbcpwk4Zu01IxrwwUtcZwYTPsPDbYnfnJ6Nw55b4xNrTpQTv/6+GLl8kq56gwisSm7lJ10dXLDp5QW40gJzdy8+RapaGTn8t0hkK8YP5GKnDly51NHRFid65ijIl7+lH6aiKubOqlaiLYv7f9zddq/0R+dLN4x5rVcXiyWiIiUCKVIuWhqnEziezwioiXCGxtJHmoR8TflxMXE1Zr8mmwcbJk6IV0EE0XkDc0NHjIIahibq12cqpVv8/dN5L9Y7UmjWpf3nT3yi7xmrtLmaGh/JMDmEYBvTYlUSi+Bup0EWKqL7ztYOIIlT+OjdZMy4tkUvpzeIhptMZQJxOHZ4lX+7GJxZUtXHdWa4xw9owR0islZYTpEjMLaNDrxI9ySRHCtHCODae6i5wid40M6UYs8pBf75nBA0yHEK9Odbk0ZTXo3I4YjwHypPuiXqrVYjNGr0MDImEg5axCOllydBClimcwARzCRRMPhQ20ioN7vsOC/05E21N0pqr0O5iaOVUNXopaNSDQ3e7VazK8SUKJxNRrZHJwrYqz/hl6SFpIs97iA4mb/Dfpm2hBvHgm5h+S2Mic5vhGJoSnUyZXQcDsRwjWM5cJUsg1ChIMbLVv0rtfhl5WatTpqejt+TauWKNDEiZFjIt6mSbSvIV2IcDhNm7wNHGoVviLSpSgHMwnL0CabyjQw78UjxHq0ya/UawxlYE3GKetqDagbWYnNS7YLF4/HUGekXRf00OJ7iDF1C0yDphwj5oaG1doc/ZOeBwMzo0rvujImD67pY0enlw3x9lBXs7PCC8J1U1IqDsTJz3xo4qIFGXBqBpbFmEo3UlShpUJ1vpW1aWqRTjqPzZUqaKNRSXKVkRMl7iN1byJAirCKpbkHX/lmNSvHOSXkNoHLpFmk0B7yjNPaAgn0WUFtpawcmtDRyP0L5C++rb4cwnWljjYalfJjtl6seyiHzc98KGdoqwRRd486+lW6zuOn7lxoBISbYsNtMdx0bjd6eD1IxOOo0MBkgm9SSciW3XMYmS7h7k39yDKKnQkZDixSYYsO6dLUtkyg6lxGCt9KA1J01Dz3pGlkrlIDW50plKEs8eJtCiXyySTjyDPanKLOR0syhhoN8Mnnh6/NYOdECa10Fs3hXzRcRsXIhylKSm5eXoM0kMw2rU7jeD7AfS9NoLstge9u6sPumRJ+9uo01va24BsbejC2UMbjozn8ee8C7jqvH1PFKh7eNYv1PUlGCPjMBzL4A3HH5ktY25XAwcUazhpqw0XDbbjvxUncQ+c8eiBLRxXRzShec2YPHtg5iyLl376hFz4N/PY/JmhcgFs2rECpWMcDO2bwg0sHkaSTKwyMX4/TOSwpGi7HKqM1YvRmTMeDiHQOKpoVMi7So/0tMazrb8HLx3L45CntGJ0s4OlDWcwVa7xcBXjx0CJenypZXT41smDMpgsVHFmsYD5fw0BH0j4pWrnjeJ5ejuO8kzvQmYphz0Te+JyYL+PZsSzGFyq4+oNd+Mr6DB779wLK5RoyzAbJZvBwbK5CI+p4YSxHw2s4PleyFFRQnN7umKvQCQpYZEuZa0XR6k9FL4QCmqOCZw224ATfb54oYKYSIMHU2T6atdpcN9iKS2j0L16fwTYK7W+NYx3puZ2NB1ZTb53I4W0aUqCzetp97KaRv3ptEq8dyWLzqjYzlCWEiWwVQ51JnNHfxncKT+/PosJILFLmk5Sn+qRv8Ll1GUxlK/jXsTyjqp6g+na9Q2+zg1E0OyyliWMEfSF10KsEVZvyik/CK9/fia37FpEj013HssjEAuydrKDONOqhQTec0Y0vPDyKY0fz+PplA3jlSJHG1HE8V8MKdoVbPtLHJPEs7Q5MlPGx1W2489wVeJDpt2Ukh6/RmFqpjtWdPrbuX8RwJold02VkF8sopz0UacDYTA0P7lmgomw0KR/DHQn85tUZpNL0IoeMVHO0jmwVSA833pwS5ys9PXopajL5bBnXUBFFYypfxp2bB5geAdYOtOHR3TN49UgOQx1pdrcYrt/Yg8OTRVzC1Btnaq5qj6OPHWTf2Dzu3z7OGiTNh3uxaTiJjStbsRAw7YdaUY/lQV1xRq+PT6zpQCsdu23vLObpzLsu7se6vjZz9PajObwytoC1nTGkGcUr6PRJ1vIku7BM0RleY8pWiVPnVAOT2QqUzWmXd9GPng+Sg6tZxIwOoxjQ4Ls2D6KDkVIijFLx3zw/gUvP7sbFw+28HdBv5DDPOmllR9W5lqPAVtaMu28CvoRQGNmhyo+OgxJzaGSujP42H73s9coY9giDKwo6fqRcvuZhK7uz5HxmfTdShMW4n5lsGdLDvdo3z2bz0FszOMg+kGBdux4qC8XHjaBUgHfh/c8FySEaWJEqRJNZW3jOReeUilX7OtmiY4yKDnvVhlIgQdoiPamzMRpxcx/dQ1CNCoqPnKdsiZOVDnAGEz73iLeaQwvncWaeMqfA+pNzdRSJXjpVyFMNUZmjkqqSd5UwnddSLqaWraG1QqhRLtLZJJb0QBoITjsX7PTnwu3lZk7ZEebyFYtSjca1sQ7v2NhrBiqioiUHHsoejrLL/WnPPD51WhdO4tEgvmJtirJOVauWITKUiDINz7E7pxmJJBX1TFkZXsdioYY2ZpOMVc3JISXubycsQZgc8cp4AU9QnmdZQEGhQF62lU01V3+yXP/8OF9wIq04SGJTJ1eerKE9kcAnz1iBX+yYxLZ989pqXYslgZ99dg2+dO4AHh+Zx+/fmsJgppWplEeJjrvglE6ry0f2z+PvrGk1iJ7WBL61eQjD3S248bFR5HmW5mnYrecN4qqze3D7k4exn8dUFzv5Ny9chYDRvnfbETvO5MSPn5bBUzunWdt0pmkibegOBs9FkAoH/NiIQiwaGci1po2wC6TsVBFxPEklV7GurmRXVTL8jc3itj/uwzXnD+EZzs/pa8HveFH48vn9GGL32/rmNB6iUS/x+InRGzdv6MPjb8/gm08dxi3nDWCETrnhoiE2Kx+n96Zw7Z9GMD1dwK0XDjE74qy9Cu7eMoKPn9OLjUPtdsSMs/MqzWM1pp+ygnpZbHjP5r3HWarmYh9q6d7RWtYI5pzgcHSGrOHI8EKwyAvkGzznCuT14ytPxft4Qbj30QPYyPPuq+f2syNWSRc3BfVWvWWUjkyVHOtNdXc+aXt4iCrNDvN2tGemiCwjvondt5N79vNKOJmroIepqZvQbKGKUZbCdL4KVgsbD+tReqrUQltUejEBGsZFRkZvw4UGG6w5t65BAyushzQ76Boe1h1U7sn9s5im4A0npXGQLX10vmJdcOfRrH5CwGWn97A7rsAMu3OBqTi3WOLNpWr1a36nnAEapKzQpfvGjw7i+o8MIMm4PPzycbzOG9SdV6zBx1a2Y5ZH2k+3H0M7a3GgJ8WeUl1uC6PqW7+W1fowsPqW4Nq9i5Ci1IS7lXlJecoRZ2R3HVmgomWyqmN0bBHXXbIanz17AL/cfhTfe+wAapUKbrtgFWYYgR26fnHfzGweF7B2rmatelTw6b0z2MTzNJcr4e+7puyYSbF7vkR+W54/igRvQ90M1ck05P5th3B4qshrWR0b13RiuCuFbJY/mlGngEaZo9T4iPc2f+evgdfPwm3UIMUL2Ricyxh9vXfVyAZQxXBfK/5y3Vl2f53nhUBs1WB62xOYIv6JPTP49LpelPgNpIO3kIAd6t5H9+NZGvLbmz7EQ14Hvod9UwWsYLQG00mTmON9Vt88dCRkyCvFs3Z8tsBuHUO70jvpM/olOpNHEx3T1Z7E958+hEdeG0eafNRCXAHyZOQx4W2+5/HA6xviQe+azFLTlsbQpIcP5XqCgs8Z7kCGzUBnoUpS5e1TkR2HF7CXKXnOqRmcSkdIqO6Ru49nkStVcfpQB1Z3p+wbw0HWWj8v5l2svxxrORMqKR9n9eWQo5M4XSnH5or2nVF3Vp/nse6au8dzOMBPigVt+soA04Xvigz81lYauJJd0R30YihVQzq31NN2u53C6oDNs8AbI/SMUtynZ1O8IRepYPQLgNI+xQahw73IMy/6eqZLgBzgDuyQm8lqcKZoHfxKIj6JE70B+IqTn2TptmNwbQv3x6p20DebjHBLx1I58qiVXWiIXm26IoVro+Vcv2BLIeV/C5vPcmepSfE2IrgOZaGNQjo1nSpwQ7YmIZ1oNZbhBVADZBW9aw/LjucgMfqoV+sCaUNKLh9uzaeuHhzR7zLhskFs8KUKaYuwDZjjZHxCedFNKMSEsqOVtnIzlwaJ3tornpE+kiECg7m5mqEOeh0gtCh0gRGFXJYqJXg4XMJowT1Gw0eID+MXUjoG7ofbBjPDLf/lPNwc5t6yrCDMHOB2OYPEqqGP06axJMqFh24JvMDPdLSMz9bq7DKhgdppuvChXdHOSD9bR0CT6ohCfAOtdVgUjjrcY/Al+6Jp420JHuoQAsVH2yOeoaxIt2VZJFLD8zeiVGzCP3tN7yPPHCrfqsM+Gu/61Vg7wk3RT/iiNZmWZqFEATTCZaSAU0zwUHqEF220R3PBl66XwqI9wkdz4cVSoKUwgemUtSd1bfXPXNP1w7FCfv3eo3MX62c220xqV2PiIJBYRLLd3ACNx3vBiHwvhSMLtOUdSjXY/Z8THVkn9bdvX7uq80cS4f38uZHTDh0v3Lzz4OznZ7Mlnhm8o/4fwuXNMDv/J1Ul+r+4bBm/d9IpLulUcnL9yZ1b3r+y/afjLzy05z//1g2LGkkBGAAAAABJRU5ErkJggg==">
                    <img class="img-fluid" src="data:image/png;base64,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"></div>
            </div>
        </div>
    </div>
</div>
<div></div>
<div></div>
<div class="full-width-div" style="display: none;">
    <div class="sk-cube-grid" style="height: 100px; width: 100px;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAdgABAQEBAQAAAAAAAAAAAAAAAAQBBQYBAQADAAMAAAAAAAAAAAAAAAABAgMEBQYQAAIABAQDCQAAAAAAAAAAAAABEQISBCExQQUDExRhscEyQlIVBhYRAQABAwIHAAAAAAAAAAAAAAABEQIDMTLwQXHBEzME/9oADAMBAAIRAxEAPwD2O6bpebnecS6uuJNPPPM2k3hKtJZVokeLzZrsl03XS6W++bprKMyVAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHe8EgNaabTUGs08wMABAqNc+2rwCQIAl1vqfL/QWdfTx5io6uuiMfTRhX7asDk/FTyxWmvPjVph3R3T75D5vcIUw6ifyRpz0iU+j2XdVcm6UJiq//2Q=="
            class="sk-cube sk-cube1" alt="cube1" style="padding: 1px; border-radius: 4px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QATwABAQAAAAAAAAAAAAAAAAAAAAYBAQEBAQAAAAAAAAAAAAAAAAABBQYQAQEAAAAAAAAAAAAAAAAAAAAhEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwClcMwwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACoj//Z"
            class="sk-cube sk-cube2" alt="cube2" style="padding: 1px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAbgABAQEBAAAAAAAAAAAAAAAAAAEFBgEBAQADAQAAAAAAAAAAAAAAAAEDBAUGEAEAAQMBBwUAAAAAAAAAAAAAARExEhQhQWGBwSITcoIDBRYRAQABAQkAAAAAAAAAAAAAAAARAfAxQVGhAgMTFP/aAAwDAQACEQMRAD8A6V4ZwwAAAFiZiYmJpMWmAbH6z7zxYar5K6fS55TXHyZ5eqnbW9G17eSImt0a2oy927PBjNViAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIw33459AJ504Ii9m6/u67FVAAAAf/Z"
            class="sk-cube sk-cube3" alt="cube3" style="padding: 1px; border-radius: 4px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAmQAAAwEAAwAAAAAAAAAAAAAABQYHBAECAwEAAwEBAQEAAAAAAAAAAAAAAwQFBgIAARAAAQIEAgYFCgQHAAAAAAAAAQIDABEEBRITITFBUSIGYXEyFAeBocFCYrIzcxU1kXIjF9FSglOTNCURAAEDAgMGBAYDAAAAAAAAAAEAAgMRBCExEkFRYTITBXGBoSKRwUJiFBXw4SP/2gAMAwEAAhEDEQA/AKVyFY6W7XlQq046embzFNnUpUwEg9GmMt223bLJ7sgpVtGHOxVXRQULSMLdM0hKRoCUJA8wjTCNoyAVPSBsUbtXLl3vta8aRsBoOKzKlfC2DPUN56BGThtZJnHSMK5qUyJzzgnW3+F1qYTjuNQuoUNJSmTbfpPnivF2hgxea+ibbZtGZR6zGzMvLo7KwgMNf7L7Y4ArYjH66vLoh2Dpg6YxgMyjx6Rg1S/nVKU81XEJ1FaSespE4zl+P93Kbcc5QSFEJPHhT9zrvkp96LHZud3gnLPmKpDr7SFoaUeNyeEdAEyeqL5cAaJ8lLAvFc/O38p0TfdWCULr3Zpp0nbgA0uHpid13O9kDcB9Wzy3pfWTgwYb13a5PraxQcv10erRtpWjks9Rw8REdCxc7GV5dwGAXhATzGqYWWKOgpMDKEMUzKScKRJKUgTJh5rWsbQYAI4AaOCht5rxXXWsrSeF91Skk/y6h5hGNnk1vLt5UeR1XErJMenVsgS4Tx4U/c675Kfeiz2bnd4J2z5imu80b9ZeWqQKKGahgofWkyIZCwpYB3rlh8sU52F8gbsIx8P7TMjSXUR2np2KdlDDCA2y2AlCEiQAEONaGigyRgAMAuXnmWWlOvLS22gTUtRAAHSTH1zgBUrxNFPeZua379UIsFhmtFQrC7UagoDWB7I2mIV3emY9KLbt/mxIyzF50tTDYORLLa2kKdbTV1khifcEwDuQk6AIetu3RxjEanI8ds1vEo/3Ok/sN6pdlOr8Ie0N3I+kKceFP3Kv+Sn3ogdm53eCQs8yqS6Wm0qfXIZaSSvaEjSYvmgxKfO9BahzmquRioAxb2VdhdQCt0jfgHCOo6YUcZnj20aOOaES85YKe86UXM1JUNpu9WqrZdmWXEzDUxrTh2GIV/HM0jqHUD8EhO14PuNUd8KrY2U1lyWma5hho7gBiV+MxDvZohi/yR7NmZTTzZW3altC/pTC3610htGWkqKAda5DcIpXsj2x+wVcUzM5wb7c1M/pvPk55VfPHmz4/iSli65Rnulc7n71O0S8Ua8KfuVf8pPvQ32bnd4I1nmVSlgFCgdx1xoCqCC8q8yM3uhUrQirYUUVLQ2EesOgwpZ3Qmb9wzQYZQ8cVsvlmpbvbnaKoHCsTQsa0LGpQ6oLcQNlYWldyRhwoUF5Aoaq2Udba6tOGop6gqxbFoWkYVp6DhhTtsbo2uY7MFBtmloLTvRu9Xmls9Ea2qSssJUEqLacRGLQCRuhyedsTdTskaSQNFSl/wDdDlrc/wD4z/GEf28PH4IH5bEC8KB/0a87MpHvQl2bnd4INnmVSXFBLalEyABJPkjQE4KgVD7Le6mz3YV1OZjEQ63sW2TpB9EY63uDE/UFGjkLHVCtNtuVJcqJqspFhbLomDtB2pO4iNdFK2Roc3Iqux4cKhaZCc9u+CLpebzNPVMLZdSl1lwFK0HSCNojlzQ4UOIXwgEJa/bblefwnJY8csZ1S7H5du+J/wCqh3FL/iMQTwpnO5SlP9LV2/W37IT7N9Xkg2W1NvM+b9DrMPePhKn3fLxykZ9rZvlpipd16bs8tlE1LynNRIaox6jp48M87Oey++YcXHlZXdtXr5nFi/LFntNammrypp9fknLTz+Soddm90dwZ2LCZZGXmf04+GcXZK6Tn5Uqn3ZJG5G7xjeyvqmHNVjnkZM5ntZvFi34YjdurjTqZ8KevySdvX7k+/qe3q9iLeKdX/9k="
            class="sk-cube sk-cube4" alt="cube4" style="padding: 1px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAmQAAAQUBAQAAAAAAAAAAAAAABwACAwQGAQUBAAEFAQAAAAAAAAAAAAAAAAUAAQIEBgMQAAEDAgQDBAcFCQAAAAAAAAECAwQAERITBQYhMRRBUSIHYYGxMkJSFXFiI4NkkcHhcqKTdDUWEQACAQIDBQUIAwEAAAAAAAAAAQIRAzESBCFBYTIFUYGhExRxkbHBIoIzFUJSYjT/2gAMAwEAAhEDEQA/ANLWGAYqQhUhCpCFSETwIhmTo8QHCZDiG8XcFGxP7Knbhmko9rHiqtILv/Cbcw4elTbIyO35sWPn71+2tR+us9m6gU9NDsA2SAbHge48PbWTBIqccVIQgQTYcT3Dj7KYY5iF7X493bSEelt3/f6d/kN+2rGl/LH2nS1zr2hzrZBkqytK02U0WpEVpxCuYUkVznZhJUaRFwTxQN967HRpbZ1HTrmDf8Zk8S3ftB+X2Vn9f0/y1nhy/AH6jT5dqwH7L2IjUWUalqYIiK4sRxwLg+ZX3aloOneYs8+Xcu0exp822WARY2labFaDUeK02hPIJSKPQswiqJIvqCWCIdR2/o2oMlqXEbWDyUEgKHpBFQu6a3NUkkNK1GWKB5M2m9oO6dMU2ouwH5KAy4eaTe+BX7jQK5onZvRpti5FCVnJNdlQp1pAkDLaCN56XqjKHYklWnvKwSG3ASlIPxi/K1Z3RLUW5qqlleIOseZGWDoEmTHZkx3I7yQtl1JQ4g8ilQsRWgnFSTTwYQaqqMc002y0lttIS2gBKUjkAOQp0klRCSoC7c6d6atqTykw5aYTaymM0hKkpwg2Cj3lXOs5q1qLs39Msu4HXvMk8HQ9rYTm6oslUHVIz/QqQVNOvA/hqHw3PYqrfTXfi8s08vE7abOnSS2GxmwWJjaEOi+W4h1B7QpBuDRa5bUltLUoplipkjHnzR24Pgkf2/40K/b2uPuKvrIEzPmHpTr8RoRpLaZi0oZdcRgQcRte5qcepwbSpL6h1qotrY9pqqJFky0zzG0CJKeivJkB5hZQ4nLPNJtQ2fVLUZOLrVcCtLVRToQHzR26OSJB/LqH7i1x9w3rIcRyvMOM5qEXT2IbyJEhxCFdQnLwpUfet28Kd9TTmoqLq3vF6pVSSNdRQtGTheWm3Y7wcdzZWE3CHVDD6wkJvQy30m1F1dWVY6SC4nfMT6eztooUUtPoW30KU2CgtKh7gHcml1TKrNN+4fVUUPgXNobnj61p6ApQTPZATJZ7bj4h6DXXQ6tXof6WJKxeU1xHa9svRdZe6iQlTUm1i80cKiByxAgg0+p0Fu66vY+A9yxGe14kGk7A2/pz6ZAQqS8jihT5CgD3hIATULHTbVt1xfEjDTRi6lHeRhK3DoCUlJnCSMQHvBrnx9F+Vcdfl823/bN4EL9M8e2psqLFsgkZuUrDm4rcMvLxerFwqEq03+BFgg3pm/Vxm9bmWN+vy7/l5Xgt9lZbX18zbm+6nhTYC7/Nv7yhoOL6uxh6nF8PRWz7+jF4bfbXDTc65vtxIW+bf3Bn03qOmTm9Ti/U5GZ68rhWttVptzd9PkFoVpvFqXUdKrK6nF+myMz1ZvhpXa02Zu6nzFOtN4L9Gv8A97HxZ2LNN+utnXwK54fD/LbhWcsf9Sxx/liDrf5V8wt+L739NagJn//Z"
            class="sk-cube sk-cube5" alt="cube5" style="padding: 1px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAmQAAAgIDAQEAAAAAAAAAAAAABQcEBgABAwIIAQACAwEBAAAAAAAAAAAAAAADBAIFBgEAEAABAgQDAwkGBAcAAAAAAAABAgMAEQQFEhMGITEiQVFhkXMUFTYHsUKywjUWgaFigsEyUiNToyQRAAIBAgQEAwcFAAAAAAAAAAABAhEDMTIEBSFxgRJhEzPwQZGhwVIUUbEiorL/2gAMAwEAAhEDEQA/APpuupKRm31JaYbQUNLKZISJSSeiA3IRUHRLAhKKSZWPTzTluFmauVQwh6qqipYW4ArCmZkEg7orts0sPLU2qyYvpbS7avFnT1KaZa03/abSjE82CUpAMsXREt1ilZ4L3o9q1SArIzZXGR48ZHjxkePD7uf02r7Fz4DG1vZHyZdTwYK0L5TtvZ/MYW270I8genyIH+p/lsdu37YBu/o9UD1eQVMxOU9vNyxmSsNlDgEyhYHOUql7I7RnTQIO4zjhwyOnR93P6bV9i58Bja3sj5Mup4MF6F8p23s/mMLbd6EeQPT5Ee9VWJy90LVEleWgvIW65yhCTMy6YlrNO70VHxPXrfeqHa16YsdsaCKWlQFS4nVgKWrpJMSs6S3bX8UShZjHBE8tUs8BQif9Mh7IPSJOiK9q3SlnrLZU1IZQxVsNqcQ+gBJ4BOSpbwYR1ujtzg3SkksQF+zFpv3ifxn8pxlalUP26fTKvsXPgMba9kfJl3PBgvQvlO29l8xhbbvQjyB6fIg7MdcOhjjWsuP0jzLTpZccQUodTvSSNhEQuRbi0nQ5JVQq670+1ZTqU4gisltLjbhCj0yUZxm7m2X48c3UrJaaa8QTUXTUlIy7bap+oabWMLlO9OcuicKyvXopwk2vBg3Oa4OoLkObohYEPu6fTKvsXPgMba9kfJl3PBgvQ3lO29l8xhbb/QjyB6fIiF6i1tTRWZmqpnC0+3UNlCxybYFulxwtqSdHVENVJqNV+oHtfqqnAlF0pDiGwvsbQenCdsKWd4+9fAFDWfci0WfWFhu72RSVH/RKYZcBQogb5AxZWNdauukXxGIX4y4IlXux0F4ol01U2CSDlOy4kK5CkwTUaeN2NJErltTVGJvwOsnKfF3vuMv1ynPqjKfjy/t2lV5b+dB03dSUWmtUoySGHCT+wxrb7pCXJlvPKwdogEaTtk/8IPWTANv9CPIHp8iClZSUNWlLNW0h5JM0tuAEEgcxhmcIy4SVQkop4lar/TPT9QsrYLtIT7rapp6lBUV1zabUuKrEXlpIvDgdbDoC12iuTWh1yoqGwQ0VyCUz2EySBtiem22FqXdVtnbemjF1LFWVlPR0rlVULDbLSSpajzCHrk1CLbwQxKSSqxNfcPFiwmfiPf8A9uHDLqjJ/lf77ip8396jI13m/bNbLvGHBxZOXu/XPbh58O2NBuNfJlj0oP6jI8Sbpif29b5bshEsuWHdyT2wXSelHkTtZEV/Wmd43aZeIfzqwd1yt+H3J+9z49koR19fMhn6U9viA1GZY9C10Of3dGZn4pbc/Jx/jl8MWdutONetPoNRrQkHFLZi/DD/ABgh0XPqNn5ac3xDDj4M7J7r/q4p82KKDdK049/Wnb8hDVV8foUSKYSP/9k="
            class="sk-cube sk-cube6" alt="cube6" style="padding: 1px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAcwABAAMBAQAAAAAAAAAAAAAAAAECAwUGAQEBAAIDAAAAAAAAAAAAAAAAAQMEAgUGEAACAQMBBwUBAAAAAAAAAAAAAQIRMRIDIVGxMhMEFIHBQlIVBhEBAQACAAcBAAAAAAAAAAAAAAERMfBBkQIyAxME/9oADAMBAAIRAxEAPwD08NXVhyTlCt8ZNcDw8tmnR5J6mpPnnKdLZNviS23ZlUB7WCNJ6/cakFDU1ZzgrQlJtL0bLe63dW2s2k7qpxRbOf3lal3bcXNXKoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlpptNUa2NAQAAAAAADsf1nS/c7rDx69SWfi9TGtflnsy347Km1+3H0uMb5Z46Mvu8rpxzVYgAAAAAP/9k="
            class="sk-cube sk-cube7" alt="cube7" style="padding: 1px; border-radius: 4px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAYgABAAMBAAAAAAAAAAAAAAAAAAECAwYBAQEBAQAAAAAAAAAAAAAAAAABBQYQAQEBAAICAQUAAAAAAAAAAAACARFRsQOh0ZJTBBQRAQEBAQEBAAAAAAAAAAAAAAABETFREv/aAAwDAQACEQMRAD8A6e/Z7Lzi7q86rd3y4a23rD1UQFTFVG8xWxvc7ueCXOBdVe83W3vdbu+S3ehNVO8zWzXebxvwSi/9P7P5vZ99fVfu+02s0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAH/2Q=="
            class="sk-cube sk-cube8" alt="cube8" style="padding: 1px; background-color: transparent;"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoMEAwMDAwMDBAMDg8QDw4MExMUFBMTHBsbGxwfHx8fHx8fHx8fAQcHBw0MDRgQEBgaFREVGh8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx//wAARCAAzADMDAREAAhEBAxEB/8QAdgABAQEBAQAAAAAAAAAAAAAAAAECBgMBAQEBAQEBAAAAAAAAAAAAAAABAgUEBhAAAgIBAgQEBwAAAAAAAAAAAAERAgMhEjFRsQRhgZEUoWKCJGQVRREBAQABAgUFAAAAAAAAAAAAAAERMWFRAhIyQvAhIlJi/9oADAMBAAIRAxEAPwDpr3vdzezu+dm31PhrbdXDbXcdwlCzZEuSvaOpeq8TNYbbbbct8W9WQXHfJjc472xv5G69BLZoSt37rurqL58l1ytezXxZq8/NdbVzXkklw0MMhVAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABdlomHETPhMT6jAgAAAAAWsblMROszHnGog7P7L2X8yP1n5W3b7r13T9W7wOt8enw7P19vW+dnr9sePbvxf/9k="
            class="sk-cube sk-cube9" alt="cube9" style="padding: 1px; border-radius: 4px; background-color: transparent;"></div>
</div>
<div class="Toastify"></div>
<div></div>
<div></div>
</div>
                    </form>