<?php
// Function to parse EML lesson content and convert it to HTML
function parseLessonEML($eml_content) {
    $xml = simplexml_load_string($eml_content);
    $html = '';

    // Check if it's a lesson element
    if ($xml->getName() === 'lesson') {
        // Get lesson title
        $title = (string)$xml->title;

        // Get lesson content
        $content = '';
        foreach ($xml->content->children() as $child) {
            // Only include content within the <content> tag
            $content .= $child->asXML();
        }

        // Generate HTML markup
        $html .= "<h2>$title</h2>";
        $html .= "<div>$content</div>";
    }

    return $html;
}
// Function to parse EML quiz content and convert it to HTML
function parseQuizEML($eml_content) {
    libxml_use_internal_errors(true);
    $xml = simplexml_load_string($eml_content);

    if ($xml === false) {
        echo "Failed to parse XML: ";
        foreach (libxml_get_errors() as $error) {
            echo $error->message;
        }
        libxml_clear_errors();
        return '';
    }

    $html = '<form id="quizForm">';

    // Iterate over quiz questions
    foreach ($xml->question as $question) {
        $questionText = (string)$question->text;
        $html .= "<div class='question' style='padding-top: 20px;'><p>$questionText</p>";

        // Iterate over options
        foreach ($question->option as $option) {
            $optionText = (string)$option;
            $isCorrect = ($option['correct'] == 'true') ? 'data-correct="true"' : 'data-correct="false"';
            $html .= "<div><label><input type='radio' name='$questionText' $isCorrect> $optionText</label></div>";
        }

        $html .= "</div>";
    }

    $html .= '</form>';

    return $html;
}
?>
