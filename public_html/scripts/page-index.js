import questions from "./questions.js"

const results = Object.values(questions)
    .flatMap(q => Object.values(q.results))   // Get all results in a one dim array
    .filter((r, i, arr) => arr.indexOf(r) === i) // Remove repeated items

const textBody = document.getElementById("text_body")

textBody.innerHTML = [...i18n.ui_index_text].join("")
document.getElementById("title").innerText = i18n.ui_index_title
document.getElementById("startbutton").innerText = i18n.ui_index_start
document.getElementById("contacts").innerHTML = [...i18n.ui_index_contacts].join("")
document.getElementById("contacts_info").innerHTML = [...i18n.ui_index_contact_info].join("")
document.getElementById("startbutton").onclick = () => location.href = `quiz.html?${i18n.$lang}`
document.getElementById("ideo_length").innerText = results.length.toFixed(0)