# HTJSON

<h3>HTML to JSON Converter.</h3>

What is this?

A basic converter which provides the ability to serialize a website as JSON. Once converted you have all the benefits of JSON while still having a usable HTML structure that you proceed to 'reinflate' back to an original site.
This can facilitate in the analysis of a static site by allowing any language with JSON support to be useful in your analysis.

<h3>A WIP.</h3>

This is currently in progress and does not have a clear focus yet. The overall goal is to make sure this handles the serialization only, limiting complexity overall.
Additionally inflation of a JSONd site will be added. This allows a user to make changes to JSON using their own language, tools, etc. while not having to worry about generation of the actual JSON.

Currently there is only a rough PHP concept. The idea is to write a version in multiple well known languages, ex. Java, Python, Javascript, etc. It's simple enough that implementation should be straight forward once the PHP structure is cleaned up a bit.

<h3>Questions?</h3>
Feel free to message me or to open an issue/pr if you think this might be of interest to you. Once the PHP code has a 'clean' structure (this is more of a prototype at the moment) I will proceed will multiple language implementation.