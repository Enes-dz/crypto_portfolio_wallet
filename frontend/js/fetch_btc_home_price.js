const fetchBTCPrice = async () => {
    const livePriceElement = document.getElementById("live-price");
    const errorMessageElement = document.getElementById("error-message");


    async function fetchBitcoinPrice() {
    const apiUrl = "https://api.dexscreener.com/token-pairs/v1/solana/3NZ9JMVBmGAqocybic2c7LQCJScmgsAZ6vQqTDzcqmJh";

    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
        throw new Error(`API request failed with status ${response.status}`);
        }

        const data = await response.json();

        
        if (data && data[0] && data[0].priceUsd) {
        livePriceElement.innerHTML = `Bitcoin Price:<br> $${data[0].priceUsd.toLocaleString()}`;
        
        errorMessageElement.textContent = ""; // 
        } else {
        throw new Error("Invalid data received from API");
        }
    } catch (error) {
        console.error(error.message);
        livePriceElement.innerHTML = "Bitcoin Price:<br> N/A";
        errorMessageElement.classList.add("data-err")
        errorMessageElement.textContent = "Data isn't available now";
    }
    }


    fetchBitcoinPrice();
    setInterval(fetchBitcoinPrice, 50000);
};