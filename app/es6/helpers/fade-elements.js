export const fadeIn = (element, time) => processFade(element, time, 0, 100);
export const fadeOut = (element, time) => processFade(element, time, 100, 0);

const processFade = (element, time, initial, end) => {
	let opc = initial;
	let increment = 0;
	initial == 0
		? (increment = 2, testClassName(element))
		: increment = -2;
	// A mágica acontece aqui, efeito de opacidade e o display NONE no fim
	const interval = setInterval(() => {
		opc == end
			? (end == 0 ? element.style.display = "none" : null,
				clearInterval(interval))
			: (opc += increment,
				element.style.opacity = opc/100,
				element.style.filter = "alpha(opacity=" + opc + ")");
	}, time * 10);
}

const testClassName = element => {
	element.className == ""
		? element.style.display = "flex"
		: element.style.display = "block";
}