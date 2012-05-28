<div id="main">
    <h2>Billing Info</h2>
    <p class="facebookLogin">
        You're almost done! Once you click submit, you'll have a one year subscription
        and access to every TapePlay video.
    </p>
    <h3>Annual Fee: $199</h3>
    <form id="coachForm" name="login" action="" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="name" name="name" value="Name On Card" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter name on credit card.</p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="cardnumber" name="cardnumber" value="Card Number" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter valid credit card number.</p>
        </div>
        <div id="creditCardDrops">
            <p class="expiration">Expiration Date:</p>
            <div class="option dropdown">
                <div class="sportSelect">
                    <div class="dropper">
                        <div class="leftMedium"></div>
                        <div class="middleMedium">
                            <p class="value">Month</p>
                        </div>
                        <div class="rightMedium"></div>
                        <ul class="potentials">
                            <li>January</li>
                            <li>February</li>
                            <li>March</li>
                            <li>April</li>
                            <li>May</li>
                            <li>June</li>
                            <li>July</li>
                            <li>August</li>
                            <li>September</li>
                            <li>October</li>
                            <li>November</li>
                            <li>December</li>
                        </ul>
                    </div>
                    <div class="arrowSmall"></div>
                </div>
            </div>
            <div class="option dropdown">
                <div class="sportSelect">
                    <div class="dropper">
                        <div class="leftMedium"></div>
                        <div class="middleMedium">
                            <p class="value">Year</p>
                        </div>
                        <div class="rightMedium"></div>
                        <ul class="potentials">
                            <?php for($i = date('Y', strtotime('now')); $i < (int)date('Y', strtotime('now')) + 10; $i++): ?>
                                <li><?php echo $i; ?></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div class="arrowSmall"></div>
                </div>
            </div>
            <p class="error">* Enter month and year.</p>
        </div>
        <div class="input cvv2">
            <a class="what">What's the CVV?</a>
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="cvv2" name="cvv2" value="CVV #" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter your school's name.</p>
        </div>
        <p class="submission italic">When you click submit, your transaction will be processed.</p>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Submit" id="submit" class="large black" />
            </div>
        </div>
        <div class="option step">
            Step 3 of 3
        </div>
    </form>
</div>
<div id="ad">
    ad
</div>