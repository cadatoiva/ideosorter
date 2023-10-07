import questions from "./questions.js"

const results = Object.values(questions)
    .flatMap(q => Object.values(q.results))   // Get all results in a one dim array
    .filter((r, i, arr)=> arr.indexOf(r)===i) // Remove repeated items

document.getElementById("title").innerHTML = i18n.ui_index_title
document.getElementById("text_body").innerHTML = i18n.ui_index_text
document.getElementById("startbutton").innerHTML = i18n.ui_index_start
document.getElementById("contacts").innerHTML = i18n.ui_index_contacts
document.getElementById("contacts_info").innerHTML = i18n.ui_index_contact_info
document.getElementById("startbutton").onclick = () => location.href = `quiz.html?${i18n.$lang}`
document.getElementById("ideo_length").innerHTML = results.length
