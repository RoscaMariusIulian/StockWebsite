function incarca(res) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("continut").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", res, true);
  xhttp.send();
}

function randomIntFromInterval(min, max) { 
  return Math.floor(Math.random() * (max - min + 1) + min);
}

async function createPage(){
	const jsonObjAMZN=await fetch('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=AMZN&apikey=78R7JP2JP31VLWM4')
	.then((response) => response.json())
	.then((data) => {
		return data;
	})
	const jsonObjFB=await fetch('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=FB&apikey=78R7JP2JP31VLWM4')
	.then((response) => response.json())
	.then((data) => {
		return data;
	})
	const jsonObjTSLA=await fetch('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=TSLA&apikey=78R7JP2JP31VLWM4')
	.then((response) => response.json())
	.then((data) => {
		return data;
	})

	var StocksAMZN=jsonObjAMZN['Time Series (Daily)'];
	var StocksTSLA=jsonObjTSLA['Time Series (Daily)'];
	var StocksFB=jsonObjFB['Time Series (Daily)'];
	
	
	var tempDataFB = [];
	var tempDataTSLA = [];
	var tempDataAMZN = [];
	
	for(var i in StocksAMZN)
	{
		tempDataAMZN.push(StocksAMZN[i]['1. open']);
		tempDataFB.push(StocksFB[i]['1. open']);
		tempDataTSLA.push(StocksTSLA[i]['1. open']);
	}
	
	localStorage.setItem('amazon', JSON.stringify(tempDataAMZN));
	localStorage.setItem('facebook', JSON.stringify(tempDataFB));
	localStorage.setItem('tesla', JSON.stringify(tempDataTSLA));
	
}
function buyNumbers()
{
	
	const tempDataAMZN= JSON.parse(localStorage.getItem('amazon'));
	const tempDataFB= JSON.parse(localStorage.getItem('facebook'));
	const tempDataTSLA= JSON.parse(localStorage.getItem('tesla'));
	const tempDataMRVL= JSON.parse(localStorage.getItem('marvel'));
	const tempDataGOOGL= JSON.parse(localStorage.getItem('google'));
	const tempDataATVI= JSON.parse(localStorage.getItem('blizzard'));
	var i=randomIntFromInterval(0,99);
	document.getElementById("priceTSLA").innerHTML="Buy price: "+tempDataTSLA[i];
	document.getElementById("priceFB").innerHTML="Buy price: "+tempDataFB[i];
	document.getElementById("priceAMZN").innerHTML="Buy price: "+tempDataAMZN[i];
	document.getElementById("pretTesla").value=tempDataTSLA[i];
	document.getElementById("pretFacebook").value=tempDataFB[i];
	document.getElementById("pretAmazon").value=tempDataAMZN[i];
	document.getElementById("priceATVI").innerHTML="Buy price: "+tempDataATVI[i];
	document.getElementById("priceMRVL").innerHTML="Buy price: "+tempDataMRVL[i];
	document.getElementById("priceGOOGL").innerHTML="Buy price: "+tempDataGOOGL[i];
	document.getElementById("pretBlizzard").value=tempDataATVI[i];
	document.getElementById("pretMarvell").value=tempDataMRVL[i];
	document.getElementById("pretGoogle").value=tempDataGOOGL[i];
	
}
function sellNumbers()
{
	
	const tempDataAMZN= JSON.parse(localStorage.getItem('amazon'));
	const tempDataFB= JSON.parse(localStorage.getItem('facebook'));
	const tempDataTSLA= JSON.parse(localStorage.getItem('tesla'));
	const tempDataMRVL= JSON.parse(localStorage.getItem('marvel'));
	const tempDataGOOGL= JSON.parse(localStorage.getItem('google'));
	const tempDataATVI= JSON.parse(localStorage.getItem('blizzard'));
	var i=randomIntFromInterval(0,99);
	document.getElementById("priceTSLA").innerHTML="Sell price: "+tempDataTSLA[i];
	document.getElementById("priceFB").innerHTML="Sell price: "+tempDataFB[i];
	document.getElementById("priceAMZN").innerHTML="Sell price: "+tempDataAMZN[i];
	document.getElementById("pretTesla").value=tempDataTSLA[i];
	document.getElementById("pretFacebook").value=tempDataFB[i];
	document.getElementById("pretAmazon").value=tempDataAMZN[i];
	document.getElementById("priceATVI").innerHTML="Sell price: "+tempDataATVI[i];
	document.getElementById("priceMRVL").innerHTML="Sell price: "+tempDataMRVL[i];
	document.getElementById("priceGOOGL").innerHTML="Sell price: "+tempDataGOOGL[i];
	document.getElementById("pretBlizzard").value=tempDataATVI[i];
	document.getElementById("pretMarvell").value=tempDataMRVL[i];
	document.getElementById("pretGoogle").value=tempDataGOOGL[i];
	
}
