

<h1><Strong> Inscription </strong></h1>
            <form method="post" action="./inscription.php">
      
                    <table>
                        
                    <tr>
                        <td><label for="Nom">Votre nom :</label></td>
                        <td><input type="text" placeholder ="Nom" name="Nom" id="Nom"/></td>
                    </tr>
					
                    <tr>
                        <td><label for="Prénom">Votre prénom :</label></td>
                        <td><input type="text" placeholder= "Prénom" name="Prénom" id="Prénom"/></td>
                    </tr>
					
					<tr>
                        
                        
						<td>
						<select name="fonction" id="fonction" >
							<option value="select" selected>Votre fonction</option>
							<option value="Etudiant">Etudiant</option>
							<option value="Administratif">Personnel administratif</option>
							<option value="Professeur">Professeur</option>
						</select>
						</td>
					</tr>	
					
                    <tr>					
						<td> 
						<select name="fillière" id="fillière" >
							<option value="select" selected> Votre fillière (si étudiant)</option>
							<option value="IR" >Informatique et réseaux</option>
							<option value="AS">Automatique et systèmes embarqués</option>
							<option value="MECA">Mécanique</option>
							<option value="TEXTILE">Textile</option>
							<option value="FIP">Systèmes de production industriels</option>
						</select>
						</td>
						
                    </tr>
					
					
                    </table>
                
                     
     
				
				<input type="submit" name="Inscription" value="Inscription">
			
				
            </form>