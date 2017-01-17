<!-- Content -->
<h1>CSS</h1>
<p>CSS Animation</p>
<hr>
<!-- Print raw html code -->
<span>html</span>
<pre>
    <code>
        &lt;div class="cssanim"&gt;&lt;/div&gt;
    </code>
</pre>
<!-- Print raw css code -->
<span>css</span>
<pre>
    <code>
        @keyframes blink {
          0% {
            background: violet;
          }
          14.3% {
            background: indigo;
          }
          28.6% {
            background: blue;
          }
          42.9% {
            background: green;
          }
          57.2% {
            background: yellow;
          }
          71.5% {
            background: orange;
          }
          85.8% {
            background: red;
          }
          100% {
            background: violet;
          }
        }

        @-webkit-keyframes blink {
          0% {
            background: violet;
          }
          14.3% {
            background: indigo;
          }
          28.6% {
            background: blue;
          }
          42.9% {
            background: green;
          }
          57.2% {
            background: yellow;
          }
          71.5% {
            background: orange;
          }
          85.8% {
            background: red;
          }
          100% {
            background: violet;
          }
        }

        .cssanim {
          height: 200px;
          width: 200px;
          border: 1px solid black;
          animation: blink 20s linear infinite;
          -webkit-animation: blink 20s linear infinite;
          -moz-animation: blink 20s linear infinite;
        }
    </code>
</pre>
<hr>
<!-- The html code -->
<div class="cssanim"></div><br>
