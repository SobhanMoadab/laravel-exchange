<template>
<div>
        <Header/>
            <div class="container">
                
                <div class="exchange-section data_background text-center"
                data-background='/site/assets/images/exchange-background.png'>

                    <CryptoBar />
                <h1 class="text-center">Buy and sell Coins at the Cryptic without additional fees</h1>
                <p class="text-center">Buy now and get +40% extra bonus Minimum pre-sale amount 25 Cryptic Coin. We accept
                    BTC crypto-currency.</p>
                <div class="exchange-calculator text-center">
                    <input type="text" name="coins-exchange" placeholder="" value="0.04321">
                    <select class="coins-exchange" name="state">
                    <option value="BTC">BTC</option>
                    <option value="BTC">Ethereum</option>
                    <option value="Ripple">Ripple</option>
                    <option value="Ripple">Bitcoin Cash</option>
                    <option value="Ripple">Cardano</option>
                    <option value="Ripple">Litecoin</option>
                    <option value="Ripple">NEO</option>
                    <option value="Ripple">Stellar</option>
                    <option value="Ripple">EOS</option>
                    <option value="Ripple">NEM</option>
                    </select>
                    <div class="equal"> = </div>
                    <input type="text" name="money-exchange" placeholder="" value="33.4343">
                    <select class="money-exchange" name="state">
                    <option value="USD">USD</option>
                    <option value="EURO">EURO</option>
                    </select>
                </div>
                <a href="tables.market-capitalizations.html" class="btn btn-default button-element">EXCHANGE NOW</a>
                </div>
                <div class="clearfix"></div>
                <div class="spacer_30"></div>
                <div class="margin_left_right_30">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-default exchange">
                        <div class="panel-body">
                        <h3><i class="cc BTC" title="BTC"></i> Bitcoin BTC</h3>
                        <div class="row">
                            <div class="col-md-6">0.00000434 <span class="color-gray">BTC</span> <span
                                class="text-info">$0.04</span></div>
                            <div class="col-md-6 text-right text-success">+1.35%</div>
                        </div>
                        <div class="highchart_currency" id="chart_btc"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-default exchange">
                        <div class="panel-body">
                        <h3><i class="cc LTC" title="LTC"></i> Litecoin LTC</h3>
                        <div class="row">
                            <div class="col-md-6">0.00000434 <span class="color-gray">LTC</span> <span
                                class="text-info">$0.04</span></div>
                            <div class="col-md-6 text-right text-danger">-1.35%</div>
                        </div>
                        <div class="highchart_currency" id="chart_ltc"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-default exchange">
                        <div class="panel-body">
                        <h3><i class="cc NEO" title="NEO"></i> Neo NEO</h3>
                        <div class="row">
                            <div class="col-md-6">0.00000434 <span class="color-gray">NEO</span> <span
                                class="text-info">$0.04</span></div>
                            <div class="col-md-6 text-right text-danger">-1.35%</div>
                        </div>
                        <div class="highchart_currency" id="chart_neo"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-default exchange">
                        <div class="panel-body">
                        <h3><i class="cc DASH" title="DASH"></i> Dash DASH</h3>
                        <div class="row">
                            <div class="col-md-6">0.000434 <span class="color-gray">DASH</span> <span
                                class="text-info">$0.04</span></div>
                            <div class="col-md-6 text-right text-success">+0.99%</div>
                        </div>
                        <div class="highchart_currency" id="chart_dash"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-default exchange">
                        <div class="panel-body">
                        <h3><i class="cc ETH" title="ETH"></i> Ethereum ETH</h3>
                        <div class="row">
                            <div class="col-md-6">0.00000434 <span class="color-gray">LTC</span> <span
                                class="text-info">$0.04</span></div>
                            <div class="col-md-6 text-right text-success">+0.35%</div>
                        </div>
                        <div class="highchart_currency" id="chart_eth"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                    <div class="panel panel-default exchange">
                        <div class="panel-body">
                        <h3><i class="cc XRP" title="XRP"></i> Ripple XRP</h3>
                        <div class="row">
                            <div class="col-md-6">0.000434 <span class="color-gray">XRP</span> <span
                                class="text-info">$0.04</span></div>
                            <div class="col-md-6 text-right text-danger">-0.99%</div>
                        </div>
                        <div class="highchart_currency" id="chart_ripple_xrp"></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="margin_left_right_30">
                <div class="chart-section1">
                    <div class="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title">Depth Chart</h3>
                        </div>
                        <div class="panel-body">
                        <div id="depthChart" class="overflow-table"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h3 class="panel-title"><span class="text-left">Sell Orders</span></h3>
                            </div>
                            <div class="panel-body">
                            <div class="table-sellorders">
                                <table class="table table-striped table-hover pull-left no-margin">
                                <thead>
                                    <tr>
                                    <th>Price</th>
                                    <th>ETH</th>
                                    <th>BTC</th>
                                    <th>Sum(BTC)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h3 class="panel-title"><span class="text-left">Buy Orders</span></h3>
                            </div>
                            <div class="panel-body">
                            <div class="table-buyorders">
                                <table class="table table-striped table-hover pull-left no-margin">
                                <thead>
                                    <tr>
                                    <th>Price</th>
                                    <th>ETH</th>
                                    <th>BTC</th>
                                    <th>Sum(BTC)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                    <tr>
                                    <td>0.10427082</td>
                                    <td>0.46172744</td>
                                    <td>1.04239753</td>
                                    <td>0.00687967</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class='clearfix'></div>
                    <div class="spacer_50"></div>
                    <div class='clearfix'></div>
                </div>
                </div>
            </div>
            <Footer/> 
     </div>
</template> 
<script>
 


import Header from '../../layout/Site/Header.vue';
import Footer from '../../layout/Site/Footer.vue';
import CryptoBar from '../../Components/crypto/CryptoBar.vue'
export default {
    name: 'HomePage',
    components:{
        Header,
        Footer ,
        CryptoBar  
    },
    
}
</script>
