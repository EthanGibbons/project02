<!DOCTYPE html>
<html lang="en">
    <head>
       <?php
        include 'header.inc';
        ?>
        <title>Position Description</title>
       <link rel="stylesheet" href="styles/styles.css">
    </head>

    <body id= left_align>
        <header>
            <!--Header with title and navigation links-->
       <?php
        include 'nav.inc';
        ?>
		<hr>
            <hr>
            <h1><strong> Jobs Positions</strong></h1>
            <br>
        </header>

        <?php
            require_once("settings.php");

            $query = "SELECT * FROM jobs";
            $result = mysqli_query($conn, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $jobTitle = $row['jobTitle'];
                    $jobReference = $row['jobReference'];
                    $salary = $row['salary'];
                    $description = $row['description'];
                    $positionReportsTo = $row['positionReportsTo'];
                    $positionInvolves = $row['positionInvolves'];
                    $essentialSkills = $row['essentialSkills'];
                    $preferableSkills = $row['preferableSkills'];


                    $positionInvolves = explode(",", $positionInvolves);
                    $essentialSkills = explode(",", $essentialSkills);
                    $preferableSkills = explode(",", $preferableSkills);

                    echo "<section>";
                    echo "<h3>$jobTitle</h3>";
                    echo "<p>Job Reference: $jobReference</p>";
                    echo "<p>Salary: $$salary per year</p>";
                    echo "<p>$description</p>";
                    echo "<p>This position will report to the $positionReportsTo</p>";
                    echo "<h4>This position Involves</h4>";
                    
                    echo "<ol>";
                    foreach ($positionInvolves as $item) {
                        echo "<li>$item</li>";
                    }
                    echo "</ol>";

                    echo "<br>";
                    
                    echo "<section>";
                    echo "<h4>Essential Skills</h4>";
                    echo "<ul>";
                    foreach ($essentialSkills as $essenSkill) {
                        echo "<li>$essenSkill</li>";
                    }
                    echo "</ul>";
                    echo "</section>";

                    echo "<br>";

                    echo "<section>";
                    echo "<h4>Preferable Skills</h4>";
                    echo "<ul>";
                    foreach ($preferableSkills as $preferSkill) {
                        echo "<li>$preferSkill</li>";
                    }
                    echo "</ul>";
                    echo "</section>";
                    
                    echo "<br>";
                    
                    echo '<a href="apply.html" title="Go to application page"><strong>Apply Now!</strong></a>';
                    
                    echo "</section><br><br>";
                }
            }


            ?>
        <!--Listing for Network Administrator--> 
        <section>
            <h3>Network Administrator</h3>
            <p>Job Reference: 102</p>
            <p>Salary: $105,120 per year</p>
            <p>Administrator involved in the implementation of company networking hardware and software.</p>
            <p>This position will report to the Head of the Internal IT Department</p>
            <h4>This position Involves</h4>
            <ol>
                <li>Implementing and initializing networking devices.</li>
                <li>Connecting all userdevices to the company network.</li>
                <li>Reporting and resolving networking issues encoutered.</li>
            </ol>
            
            <br>

            <section>
                <h4>Essential Skills</h4>
                <ul>
                    <li>Bachelor of IT or equivelent qualification</li>
                    <li>3 or more years work in networking administration</li>
                    <li>Strong understanding of networking structure and security</li>
                </ul>
            </section>

            <br>

            <section>
                <h4>Preferable Skills</h4>
                <ul>
                    <li>Familiaity will common network interfaces and devices</li>
                    <li>Experience with setting up physical networks</li>
                </ul>
            </section>
            <br>
            <a href="apply.html" title="Go to application page"><strong>Apply Now!</strong></a>
        </section>

        <br>
        <br>
        
        <!--Job listing for Cybersecurity Specialist-->
        <section>
            <h3>Cybersecurity Specialist</h3>
            <p>Job Reference: 101</p>
            <p>Salary: $135,970 per year</p>
            <p>The primary specialist in charge of implementing and upkeeping software
                 and hardware solutions for involved clients and businesses.</p>
            <p>This position will report to the Head of the Development</p>
            <h4>This position Involves</h4>
            <ol>
                <li>Upkeeping the security aspects of the client network.</li>
                <li>Ensuring the most optimanal cyber security configuations and softwares are running all devices.</li>
                <LI>Reporting and resolving compromisations.</LI>
            </ol>
            
            <br>

            <section>
                <h4>Essential Skills</h4>
                <ul>
                    <li>Bachelor of Cybersecurity or equivelent qualification</li>
                    <li>3 or more years work in Cybersecurity</li>
                    <li>Strong understanding of networking structure and security</li>
                </ul>
            </section>

            <br>

            <section>
                <h4>Preferable Skills</h4>
                <ul>
                    <li>Qualification/s in networking</li>
                    <li>Experience with common antivirus programs</li>
                </ul>
            </section>
            <br>
            <a href="apply.html" title="Go to application page" ><strong>Apply Now!</strong></a>
        </section>

        <br>

        
        <footer>
            <h5>Tech Shield Lt &copy;</h5>
        </footer>
    </body>
</html>
