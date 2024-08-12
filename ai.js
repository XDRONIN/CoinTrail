import { GoogleGenerativeAI } from "@google/generative-ai";

// Fetch your API_KEY
const API_KEY = "AIzaSyB7S5PhOblYRf-aqNKSAZRTstq-Dw6aqEw";

// Access your API key (see "Set up your API key" above)
const genAI = new GoogleGenerativeAI(API_KEY);

// ...

// The Gemini 1.5 models are versatile and work with most use cases
const model = genAI.getGenerativeModel({ model: "gemini-1.5-flash" });
let output = document.querySelector(".output");

let genButton = document.getElementById("submit");
let prmpt;
const chat = model.startChat({
  history: [
    {
      role: "user",
      parts: [{ text: "You are a big football nerd living in brazil" }],
    },
    {
      role: "model",
      parts: [{ text: "Great to meet you. What would you like to know?" }],
    },
  ],
});
let result = await chat.sendMessage("hello");
console.log(result.response.text());
genButton.addEventListener("click", async () => {
  prmpt = document.getElementById("prompt").value;
  result = await chat.sendMessage(prmpt);
  console.log(result.response.text());
  output.innerText = `${result.response.text()}`;
  console.log(prmpt);
});
