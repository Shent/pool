<?php

$algo = user()->getState('yaamp-algo');

JavascriptFile("/extensions/jqplot/jquery.jqplot.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.dateAxisRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.barRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.highlighter.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.cursor.js");
JavascriptFile('/yaamp/ui/js/auto_refresh.js');

$height = '240px';

$min_payout = floatval(YAAMP_PAYMENTS_MINI);
$min_sunday = $min_payout/10;

$payout_freq = (YAAMP_PAYMENTS_FREQ / 3600)." hours";
?>

<div id='resume_update_button' style='color: #444; background-color: #ffd; border: 1px solid #eea;
	padding: 10px; margin-left: 20px; margin-right: 20px; margin-top: 15px; cursor: pointer; display: none;'
	onclick='auto_page_resume();' align=center>
	<b>Auto refresh is paused - Click to resume</b></div>

<table cellspacing=20 width=100%>
<tr><td valign=top width=50%>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">Shent MINING POOLS</div>
<div class="main-left-inner">

<ul>
<li>No registration is required, we do payouts in the currency you mine. Use your wallet address as the username.</li>
<li>&nbsp;</li>
<li>Payouts are made automatically every <?= $payout_freq ?> for all balances above <b><?= $min_payout ?></b>, or <b><?= $min_sunday ?></b> on Sunday.</li>
<li>For some coins, there is an initial delay before the first payout, please wait at least 6 hours before asking for support.</li>
<li>Blocks are distributed proportionally among valid submitted shares.</li>

<br/>

</ul>
</div></div>
<br/>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">STRATUM SERVERS</div>
<div class="main-left-inner">

<ul>

<li>
<p class="main-left-box" style='padding: 3px; font-size: .8em; background-color: #ffffee; font-family: monospace;'>
	-o stratum+tcp://<?= YAAMP_STRATUM_URL ?>:&lt;PORT&gt; -u &lt;WALLET_ADDRESS&gt; [-p &lt;OPTIONS&gt;]</p>
</li>

<?php if (YAAMP_ALLOW_EXCHANGE): ?>
<li>&lt;WALLET_ADDRESS&gt; can be one of any currency we mine or a BTC address.</li>
<?php else: ?>
<li>&lt;WALLET_ADDRESS&gt; should be valid for the currency you mine. <b>DO NOT USE a BTC address here, the auto exchange is disabled</b>!</li>
<?php endif; ?>
<li>As optional password, you can use <b>-p c=&lt;SYMBOL&gt;</b> if yiimp does not set the currency correctly on the Wallet page.</li>
<li>See the "Pool Status" area on the right for PORT numbers. Algorithms without associated coins are disabled.</li>

<br>

</ul>
</div></div><br>
<div class="main-left-box"></div>
<br>
</td><td valign=top>
<div id='pool_current_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

<div id='pool_history_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

</td></tr></table>

<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

<script>

function page_refresh()
{
	pool_current_refresh();
	pool_history_refresh();
}

function select_algo(algo)
{
	window.location.href = '/site/algo?algo='+algo+'&r=/';
}

////////////////////////////////////////////////////

function pool_current_ready(data)
{
	$('#pool_current_results').html(data);
}

function pool_current_refresh()
{
	var url = "/site/current_results";
	$.get(url, '', pool_current_ready);
}

////////////////////////////////////////////////////

function pool_history_ready(data)
{
	$('#pool_history_results').html(data);
}

function pool_history_refresh()
{
	var url = "/site/history_results";
	$.get(url, '', pool_history_ready);
}

</script>
