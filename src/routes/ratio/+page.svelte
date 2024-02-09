<script>
	// @ts-nocheck

	let currentSection = 0;
	const sections = [];
	let cursor = null;
	let insideCursor = null;

	//mouse speed
	let lastMouseX = 0;
	let lastMouseY = 0;
	let speedX = 0;
	let speedY = 0;
	let marge;
	let cas = 0;

	let scrollLevel = 0

	const handleScroll = (e) => {
		if (e.deltaY > 0 && currentSection < sections.length - 1) {
			currentSection++;
		} else if (e.deltaY < 0 && currentSection > 0) {
			currentSection--;
		}
		scrollToSection(currentSection);
	};

	const handleMouseMove = (e) => {
		const currentMouseX = e.clientX;
		const currentMouseY = e.clientY;
		scrollLevel = window.scrollY
		if (lastMouseX !== undefined && lastMouseY !== undefined) {
			const deltaX = Math.abs(currentMouseX - lastMouseX);
			const deltaY = Math.abs(currentMouseY - lastMouseY);
			const speed = Math.sqrt(deltaX * deltaX + deltaY * deltaY); // Magnitude de la vitesse

			// Ajustez le diamètre du curseur en fonction de la vitesse
			const cursorDiameter = Math.max(40 + speed * 3, 20); // Taille minimale de 20px
			marge = Math.floor(cursorDiameter / 3);
			cursor.style.width = `${cursorDiameter}px`;
			cursor.style.height = `${cursorDiameter}px`;
		}
		cursor.style.left = `${currentMouseX - marge}px`;
		cursor.style.top = `${currentMouseY - marge  + scrollLevel}px`;

		insideCursor.style.left = `${currentMouseX - 5}px`;
		insideCursor.style.top = `${currentMouseY - 5  + scrollLevel}px`;

		lastMouseX = currentMouseX;
		lastMouseY = currentMouseY;
	};

	function mouseEnterButtonNavBar() {
		cursor.style.visibility = 'hidden';
	}

	function mouseLeaveButtonNavBar() {
		cursor.style.visibility = 'visible';
	}

	function scrollToSection(index) {
		const targetPosition = sections[index].offsetTop;
		window.scrollTo({
			top: targetPosition,
			behavior: 'smooth'
		});
	}
</script>

<body role="application" on:wheel={handleScroll} on:mousemove={handleMouseMove}>
	<div class="absoluteElements">
		<div bind:this={cursor} class="circleMouse" />
		<div bind:this={insideCursor} class="insideCircle" />
		<div class="navbarDiv">
			<!-- svelte-ignore a11y-mouse-events-have-key-events -->
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 0)}
				class="navbarButton">about me</button
			>
			<div class="spacerNavbar" />
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 1)}
				class="navbarButton">projects</button
			>
			<div class="spacerNavbar" />
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 2)}
				class="navbarButton">test</button
			>
			<div class="spacerNavbar" />
			<button
				on:mouseleave={mouseLeaveButtonNavBar}
				on:mouseenter={mouseEnterButtonNavBar}
				on:click={scrollToSection.bind(this, 3)}
				class="navbarButton">test</button
			>
		</div>
	</div>

	<div class="section" id="sec1" bind:this={sections[0]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
	<div class="section" id="sec2" bind:this={sections[1]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
	<div class="section" id="sec3" bind:this={sections[2]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
</body>

<!-- 
----colors----

black : 141416


-->

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;500&display=swap');

	* {
		font-family: 'Roboto', sans-serif;
		padding: 0;
		overflow: hidden;
		margin: 0;
		cursor: none;
	}

	body {
		padding: 0;
		margin: 0;
	}

	.circleMouse {
		position: absolute;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		transition: 0.05s ease;
		z-index: 20;
		background-color: white;
		mix-blend-mode: difference; /* Changez le mode de fusion selon vos préférences */
		pointer-events: none; /* Assurez-vous que le cercle ne bloque pas les événements de la souris */
	}

	.insideCircle {
		position: absolute;
		width: 20px;
		z-index: 20;
		height: 20px;
		border-radius: 50%;
		background-color: white;
		mix-blend-mode: difference;
		opacity: 70%;
		pointer-events: none;
	}

	.section {
		display: flex;
		width: 100vw;
		height: 100vh;
		justify-content: center;
		align-items: center;
	}

	#sec1 {
		background-color: #141416;
	}

	#sec2 {
		background-color: #141416;
	}

	#sec3 {
		background-color: #141416;
	}

	#mainTittle {
		font-size: 200px;
		color: white;
		animation: tracking-in-expand 1s ease forwards;
		margin: 0;
		user-select: none;
		margin-bottom: 100px;
	}

	.navbarDiv {
		position: fixed;
		top: 90%;
		left: 50%;
		display: flex;
		justify-content: space-between;
		width: 30%;
		align-items: center;
		overflow:visible;
		transform: translate(-50%, -50%);
		height: 90px;
	}

	.navbarButton {
		min-width: 70px;
		min-height: 70px;
		border-radius: 1000px;
		background-color: #141416;
		font-family: 'Roboto', sans-serif;
		border: 2px solid #2f2f31;
		color: #2f2f31;
		font-size: 80%;
		z-index: 19;
		font-weight: bolder;
		position: relative;
	}

	.navbarButton::before {
		content: '';
		display: block;
		width: 0px;
		height: 0px;
		background-color: white;
		border-radius: 50%;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		transition: width 0.3s, height 0.3s;
	}

	.navbarButton:hover {
		color: #141416;
		transform: scale(1.1); /* Agrandit le bouton au survol */
	}

	.navbarButton:hover::before {
		width: 90px;
		height: 90px;
		z-index: -1;
	}

	.spacerNavbar {
		width: 100%;
		height: 2px;
		background-color: #2f2f31;
	}

	.navbarA:hover {
		color: white;
		transition: 1s ease;
	}

	.MainTittleSection {
		display: flex;
	}

	/* @-webkit-keyframes tracking-in-expand {
		0% {
			letter-spacing: -0.5em;
			opacity: 0;
		}
		40% {
			opacity: 0.6;
		}
		100% {
			opacity: 1;
		}
	} */
	@keyframes tracking-in-expand {
		0% {
			letter-spacing: -0.5em;
			opacity: 0;
		}
		40% {
			opacity: 0.6;
		}
		100% {
			opacity: 1;
		}
	}
</style>
