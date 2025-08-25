<?php


// name, title, imagefilename, website, keywordsarray
$members = array(
    array("Dr Jason Adair", "Lecturer", "/intro/photos/jad.jpg", "https://www.cs.stir.ac.uk/~jad", array("optimisation", "metaheuristics", "machine learning", "explainability")),
    array("Dr Ahsan Adeel", "Reader", "/intro/photos/adl.jpg", "https://www.cs.stir.ac.uk/~adl", array("Biologically plausible neural net","Neural information processing","Dendritic computation","Multisensory integration","Neuromorphic nanotechnology")),
    array("Dr Vahid Akbari", "Lecturer", "/intro/photos/vak.jpg", "https://www.cs.stir.ac.uk/~vak", array("Earth observation","Radar remote sensing","statistical modeling","machine learning")),
    array("Dr Hazrat Ali", "Lecturer", "/research/dais/people/hazrat.jpg", "https://www.stir.ac.uk/people/1987004", array("Medical AI")),
    array("Dr Leonardo Bezerra", "Lecturer", "/intro/photos/lbe.jpg", "https://www.cs.stir.ac.uk/~lbe", array("Heuristic","optimization","Machine and deep learning","Automated algorithm engineering","Data science","AI accountability")),
    array("Dr Sandy Brownlee", "Senior Lecturer, Group Leader", "/intro/photos/sbr.jpg", "https://www.cs.stir.ac.uk/~sbr", array("optimisation", "metaheuristics", "explainability")),
    array("Dr Burcu Can Buglalilar", "Lecturer", "/intro/photos/bca.jpg", "", array("natural language processing","computational linguistics","deep learning","machine learning")),
    array("Giancarlo Catalano", "MPhil Student", "/intro/photos/gac.jpg", "", array("Optimisation","Metaheuristics","Explainability")),
    array("Ipshita Roy Chowdhury", "Phd Student", "/intro/photos/ich.jpg", "", array("Deep Learning", "Malware", "Ontology", "Signal Processing")),
    array("Dr Yuanlin Gu", "Lecturer", "/intro/photos/ygu.jpg", "https://www.stir.ac.uk/people/1917176", array("NARMAX method", "Interpretable machine learning", "Model uncertainty", "Multidisciplinary applications of the above")),
    array("Dr Simona Hapca", "Lecturer", "/intro/photos/szh.jpg", "https://www.stir.ac.uk/people/1437998", array("statistical methodology", "health and social care")),
//    array("Dr Keiller Nogueira", "Lecturer", "/intro/photos/kno.jpg", "https://www.stir.ac.uk/people/1427473", array("deep learning", "image processing", "remote sensing")),
    array("Prof Gabriela Ochoa", "Professor", "/intro/photos/goc.jpg", "https://www.cs.stir.ac.uk/~goc/", array("Evolutionary Computation", "Fitness Landscape Analysis", "Metaheuristics", "Hyper-heuristics", "Neuroevolution")),
    //array("Jefersson dos Santos", "Lecturer", "/intro/photos/jds.jpg", "https://www.stir.ac.uk/people/1822968", array("Computer Vision", "Machine Learning", "Image Processing", "Remote Sensing")),
    array("Dr Stefano Sarti", "Teaching Assistant / Research Assistant", "/intro/photos/ssa.jpg", "https://www.stir.ac.uk/people/1458413", array("Evolutionary Algorithms", "Neural Networks", "Neuroevolution")),
//    array("Manjinder Singh", "Phd Student", "/intro/photos/mas.jpg", "", array("Evolutionary Algorithms", "Explainability")),
    array("Prof Leslie Smith", "Emeritus Professor", "/intro/photos/lss.jpg", "https://www.cs.stir.ac.uk/~lss/", array("Artificial general intelligence","sensory systems","  interpreting sound", "neuromorphic systems")),
    array("Dr Paulius Stankaitis", "Lecturer", "/research/dais/people/paulius.jpg", "https://www.stir.ac.uk/people/1967891", array("Safe AI","Formal Methods","Cyber-Physical Systems")),
    array("Prof Kevin Swingler", "Professor, Head of CSM", "/intro/photos/kms.jpg", "https://www.stir.ac.uk/people/256072", array("Computer vision", "AI", "machine learning", "assistive technology"))
    //array("Dr Sarah Thomson", "Lecturer", "/intro/photos/sto.jpg", "https://www.stir.ac.uk/people/257027", array("machine learning", "optimisation", "evolutionary algorithms", "healthcare"))
//    array("", "", "people/blank.jpg", array("", "", "")),
);


foreach ($members as &$member) {
    $urlstart = "";
    $urlend = "";
    if ($member[3] != "") {
        $urlstart = "<a href='".$member[3]."'>";
        $urlend = "</a>";
    }

?>

            <div class="members-cell">
                <?=$urlstart?>
                <img src="<?=$member[2]?>" width="130" height="150" style="padding:10px;margin:auto;" />
                <?=$urlend?>
                <p><b><?=$member[0]?></b><br /><?=$member[1]?></p>
                <ul>
<?php foreach ($member[4] as &$keyword) { ?>
                <li><?=$keyword?></li>
<?php } ?>
                </ul>
            </div>

<?php
}
?>
