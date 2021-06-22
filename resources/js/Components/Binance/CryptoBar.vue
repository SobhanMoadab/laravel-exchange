<template>
        <div class="horz-list mb-4 ">
                    <ul >
  <content-loader :width="700" :height="40" :speed="1" primaryColor="#f7f7f700" secondaryColor="#ffd500" > 
  <rect x="14" y="11" rx="0" ry="0" width="102" height="9" /> <rect x="132" y="11" rx="0" ry="0" width="102" height="9" /> 
  <rect x="253" y="11" rx="0" ry="0" width="102" height="9" /> <rect x="377" y="11" rx="0" ry="0" width="102" height="9" /> 
  <rect x="497" y="11" rx="0" ry="0" width="102" height="9" /></content-loader>     
                        <li><i class="cc BTC ">  </i>  $ <span class="coin-value">{{this.BTCBUSD.c}}</span></li>
                        <li><i class="cc ETH ">  </i>  $ <span class="coin-value">{{this.ETHBUSD.c}}</span></li>
                        <li><i class="cc BNB ">  </i>  $ <span class="coin-value">{{this.BNBBUSD.c}}</span></li>
                        <li><i class="cc FIL">   </i>  $ <span class="coin-value">{{this.FILBUSD.c}}</span></li>
                        <li><i class="cc ADA ">  </i>  $ <span class="coin-value">{{this.ADABUSD.c}}</span></li>
                        <li><i class="cc DOGE "> </i>  $ <span class="coin-value">{{this.LTCBTC.c}}</span></li>

                    </ul>

        </div>
</template>
<script>
import { ContentLoader } from "vue-content-loader"
import axios from 'axios';
export default {
    components:{
        ContentLoader
    },
    name:'CryptoBar',
    data: () => ({
        
            ETHBUSD:'',
            BNBBUSD:'',
            BTCBUSD:'',
            FILBUSD:'',
            ADABUSD:'',
            LTCBTC:''
       
    }),
    methods: {
        getCrypto(){
            // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=ETHBUSD').then((res) => {this.binance.ETHBUSD =  res.data.lastPrice}),
            // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=BNBBUSD').then((res) => {this.binance.BNBBUSD = res.data.lastPrice }),
            // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=BTCBUSD').then((res) => {this.binance.BTCBUSD = res.data.lastPrice }),
            // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=FILBUSD').then((res) => {this.binance.FILBUSD = res.data.lastPrice }),
            // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=ADABUSD').then((res) => {this.binance.ADABUSD = res.data.lastPrice }),
            // axios.get('https://api.binance.com/api/v1/ticker/24hr?symbol=LTCBTC').then((res) => {this.binance.LTCBTC =res.data.lastPrice })

        }
    },
    created() {
            this.BNB = new WebSocket("wss://stream.binance.com:9443/stream?streams=ethusdt@ticker/btcusdt@ticker");
            this.ETH = new WebSocket("wss://stream.binance.com:9443/ws/ethusdt@ticker");
            this.BTC = new WebSocket("wss://stream.binance.com:9443/ws/btcusdt@ticker");
            this.FIL = new WebSocket("wss://stream.binance.com:9443/ws/filusdt@ticker");
            this.ADA = new WebSocket("wss://stream.binance.com:9443/ws/adausdt@ticker");
            this.LTC = new WebSocket("wss://stream.binance.com:9443/ws/dogeusdt@ticker");
            this.BNB.onmessage = (event) => {
            this.BNBBUSD = JSON.parse(event.data);
            } 
            // this.BNB.onopen = (event) => {
            // console.log(event)
            // }
            this.ETH.onmessage = (event) => {
            this.ETHBUSD = JSON.parse(event.data);
            }
            this.BTC.onmessage = (event) => {
            this.BTCBUSD = JSON.parse(event.data);
            }
            this.FIL.onmessage = (event) => {
            this.FILBUSD = JSON.parse(event.data);
            }
            this.ADA.onmessage = (event) => {
            this.ADABUSD = JSON.parse(event.data);
            }
            this.LTC.onmessage = (event) => {
            this.LTCBUSD = JSON.parse(event.data);
            }
            
    },
    

}
</script>
<style>
.horz-list{
        border-top:3px solid #ffd500;
}
.horz-list li i {
    font-size:20px;
    margin-right:3px;
}
.horz-list ul {
  margin: 0 10rem;
  padding:19px ;
  list-style-type: none;
  text-align: center;
    background-color: #00000020;
    border-radius:10px;


}

.horz-list ul li {
  display: inline;
  color:#fff;
}

.horz-list ul li {
  text-decoration: none;
  padding: 4px 12px;
  list-style:
 
}

.horz-list  .coin-value{
     color:fff;
}

</style>