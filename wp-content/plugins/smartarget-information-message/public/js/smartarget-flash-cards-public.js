function init_flash_cards (hash)
{
	if (!hash)
	{
		return;
	}

	insertJs_flash_cards(hash);
}

function insertJs_flash_cards (hash)
{
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = `https://smartarget.online/loader.js?ver=${Math.random()}&u=${hash}&source=wordpress_flash_cards`;
	document.head.appendChild(script);
}

init_flash_cards(smartarget_flash_cards_params.hash);
