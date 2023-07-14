import smtplib 
from email.message import EmailMessage
#Email
asunto = "Codigo de validación" 
yo = "tavizone1885@outlook.com"
num="7451"
id="66"
contra="666666666"  
tu = "tavizone.rivera.santiago@cbtis118.edu.mx"
nom="66"
ape="66"
smtp = "smtp-mail.outlook.com"
contraseña = "drpepper85@"
#Mensaje
mensaje = EmailMessage()  
mensaje['Subject'] = asunto 
mensaje['From'] = yo 
mensaje['To'] = tu 
mensaje.set_content("Hola usuario:"+ nom+" "+ape+" Tus datos fueron -- Email: "+tu+" -- ID: "+str(id)+" -- Contraseña: "+contra+" -- Numero de seguridad: "+str(num))
#Servidor
servidor = smtplib.SMTP(smtp, 587) 
servidor.ehlo() 
servidor.starttls() 
servidor.login(yo, contraseña) 
servidor.send_message(mensaje) 
servidor.quit()