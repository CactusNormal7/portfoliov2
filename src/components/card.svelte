<!-- MyComponent.svelte -->
<script>
    export let first = "first";
    export let second = "second";
</script>

<div class="card">
	<div class="first-content">
		<span id="firstspan">{first}</span>
	</div>

</div>

<style>
	.card {
		width: 190px;
		height: 254px;
        color: #2f2f31;
		background: #141416;
		transition: all 0.4s;
        border: 2px solid #2f2f31;
		border-radius: 10px;
        text-shadow: 10px 10px #141416;
		font-size: 30px;
		font-weight: 900;
	}

    #firstspan {
        max-width: 70%;
    }

	.card:hover {
		border-radius: 15px;
		cursor: pointer;
		transform: scale(1.1);
        color: white;
        text-shadow: 15px 15px #141416;
        box-shadow: 12px 12px 0px 0px #2f2f31;
		background: white;
	}

	.first-content {
		height: 100%;
		width: 100%;
		transition: all 0.4s;
		display: flex;
		justify-content: center;
		align-items: center;
		opacity: 1;
		border-radius: 15px;
	}

	.card:hover .first-content {
		height: 0px;
		opacity: 0;
	}

	.second-content {
		height: 0%;
		width: 100%;
		opacity: 0;
		display: flex;
		justify-content: center;
		align-items: center;
		border-radius: 15px;
		transition: all 0.4s;
		font-size: 0px;
		transform: rotate(90deg) scale(-1);
	}

	.card:hover .second-content {
		opacity: 1;
		height: 100%;
		font-size: 1.8rem;
		transform: rotate(0deg);
	}
</style>


<!-- 
----colors----

black : 141416
grey : 2f2f31

-->