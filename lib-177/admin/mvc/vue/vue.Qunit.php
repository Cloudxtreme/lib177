<?php
Head::insert('Qunit', 'Test de Qunite', 'Qunit Try');
echo '<h1 id="qunit-header">QUnit Test Suite</h1>  
    <h2 id="qunit-banner"></h2>  
    <div id="qunit-testrunner-toolbar"></div>  
    <h2 id="qunit-userAgent"></h2>  
    <ol id="qunit-tests"></ol>';
Foot::insert(array('Qunit.js', 'testQunit.js', 'myTest.js'));
?>