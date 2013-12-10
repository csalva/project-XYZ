<?php
//require_once('includes/checksession.php');
require_once('includes/connection.php');
require_once('includes/template.php');
/*require_once('includes/func.getUserID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}*/

$code = <<<EOD
EOD;
openHeader('Project XYZ', '/project-xyz/styles/styles.css',$code);
openBody('Aviso legal','mainPage', $connection);

?>
<div id="legal">
<h3>Información legal y de privacidad</h3>

<p>Project XYZ respeta tu privacidad. Esta Política de privacidad establece la forma en la que gestionamos la información que obtenemos de ti cuando visitas nuestros sitios web, incluido nuestro sitio principal www.project-XYZ.org. Esta Política de privacidad trata las siguientes cuestiones:</p>
<ul>
<li>La información que recopilamos</li>
<li>El acceso a tu información por terceras partes</li>
<li>Las opciones que tienes a tu disposición relativas a la forma en la que se utiliza tu información y a quién se transfiere</li>
<li>Tus derechos de acceso y corrección o actualización de tu información personal</li>
<li>Nuestro compromiso de instaurar los procedimientos de seguridad razonables vigentes para proteger la pérdida, uso incorrecto o modificación de la información que está bajo nuestro control</li>
<li>Información que recopilamos y la forma en la que la utilizamos</li>
</ul>
<p>project-XYZ.org podría recopilar dos tipos de información sobre ti cuando visitas nuestro sitio: información personal (incluidos, a modo de ejemplo únicamente, tu nombre, tu dirección, tu número de teléfono y tu dirección de correo electrónico), e información adicional no personal (como, por ejemplo, información relativa a las páginas de nuestro sitio que has visitado y tu dirección IP).</p>
<ol>
<li>Información personal
<p>La única información personal que recopilaremos y guardaremos sobre ti es la información que tú elijas proporcionarnos. Por ejemplo, recopilamos tu información personal cuando tú nos envías un correo electrónico o una carta. Utilizaremos esta información, que tú nos proporcionas, para responder a tu correo electrónico o carta. De la misma forma, también podríamos utilizar esta información para enviarte notificaciones sobre nuestros productos y sobre eventos de project-XYZ.org.</p></li>
<li>Información no personal
<p>Recopilamos y utilizamos información no personal sobre ti de las siguientes formas:</p>
<p>a. Remitentes, direcciones IP y otra información no personal</p>
<p>project-XYZ.org recopila información mediante “remitentes”, direcciones IP y diversas variables de entorno. Un “remitente” es la información que el navegador web transfiere al servidor web de project-XYZ.org que hace referencia a la URL desde la que llegó a nuestro sitio. La “dirección IP” es un número que utilizan los ordenadores de la red para identificar a tu equipo y que de este modo podamos transmitirte datos. Las “variables de entorno” incluyen, entre otros elementos, el dominio desde el que accede a Internet, la hora en la que accediste a nuestro sitio web, los tipos de navegador web y sistema operativo o plataforma que utilizas, la dirección de Internet de los sitios web que abandonaste para visitar project-XYZ.org, los nombres de las páginas que visitas mientras estás en nuestro sitio web y la dirección de Internet del sitio que visitas posteriormente. El objetivo de recopilar toda esta información es permitirnos detectar amplias tendencias demográficas, proporcionar información adaptada a nuestros intereses y mejorar tu experiencia en nuestros sitios web.</p>
<p>b. Creación de perfiles</p>
<p>Para que podamos mejorar nuestros sitios web y asegurarnos de que desarrollamos todos los esfuerzos posibles para proporcionarte información de tu interés, podríamos fusionar tu información personal con datos de flujo de clics y otros datos de los que dispongamos (incluidos datos sin conexión). No combinaremos tu información personal de esta forma sin darte la oportunidad de rechazar este tipo de combinación. La oportunidad de rechazar la combinación se te dará en el momento y sección en la que se recopila la información, y antes de que la información se introduzca en nuestro sistema. De la misma forma, también podríamos desarrollar un perfil basándonos en el uso que realices del sitio que no incluya ninguna información personal.</p></li>
<li>Uso compartido de tu información con terceros
<p>Podríamos compartir tu información personal (como, por ejemplo, tu nombre, tu dirección, tu dirección de correo electrónico y tu 	número de teléfono) con nuestros afiliados sin tu consentimiento previo, incluidas entidades como Steam, Minijuegos y Kabam. No compartiremos tu información personal con terceros no afiliados sin tu consentimiento previo.</p></li>
<li>Vínculos
<p>Este sitio web podría contener vínculos a otros sitios. Debes tener en cuenta que no somos responsables de las prácticas de privacidad de estos otros sitios. Animamos a nuestros usuarios a que lean las declaraciones de privacidad de todos los sitios web que visitan. En términos generales, debes tener cuidado a la hora de proporcionar información personal a todos los sitios web, a menos que confíes en el propietario y en la entidad que opera el sitio web. Esta declaración de privacidad se aplica únicamente a la información recopilada cuando visitas la familia de sitios web de project-XYZ.org.</p></li>

<li>Notificación de cambios
<p>Si decidimos modificar nuestra política de privacidad, publicaremos los cambios mencionados en nuestro sitio web, de forma que siempre estés al tanto de la información que recopilamos, la forma en la que la utilizamos y bajo qué circunstancias la revelamos. Es responsabilidad tuya revisar nuestra política de privacidad, en busca de cambios, cada cierto tiempo. Si en algún punto decidimos utilizar información personal de una forma diferente a la indicada en el momento en el que se recopiló, te avisaremos por correo electrónico, siempre que nos hayas proporcionado una dirección de correo electrónico. En ese momento, tendrás la opción de decidir si quieres o no que utilicemos tu información de esta forma distinta.</p></li>

<li>Política especial relativa a la información de niños de menos de trece años</li>
</ol>
<p>Project-XYZ.org no está dirigido a niños de menos de 13 años, y no recopilamos conscientemente información personal de ningún niño menor de 13 años sin el consentimiento previo de sus padres. Cuando recibamos este tipo de información, la eliminaremos en cuanto tengamos constancia de ello, y no la utilizaremos ni la compartiremos con terceros.</p>

<h3>Opciones</h3>

<p>project-XYZ.org te ofrece las siguientes opciones en lo que respecta al uso de tu información:</p>

<ul>
<li>Podrás optar por no proporcionarnos ningún tipo de información de contacto.</li>
<li>Podrás optar por proporcionarnos información personal, pero negarte a que compartamos tu información con terceros.</li>
<li>Si quieres que cancelemos tu suscripción a cualquiera de nuestros servicios, o quieres que te eliminemos de cualquiera de nuestras listas de correo a través de Internet, haz clic en el vínculo “cancelar suscripción” que aparece al final de cualquiera de nuestros mensajes de correo electrónico.</li>
</ul>
<h3>Cookies</h3>
<ul>
<li>Project-XYZ.org podría utilizar cookies para facilitar tu experiencia dentro de nuestro sitio web. Por ejemplo, las cookies podrían utilizarse para facilitarte el acceso a áreas protegidas, o para recordar preferencias de usuario. Si no tienes las cookies habilitadas en tu navegador web, es posible que no puedas utilizar ciertas características de nuestro sitio web.</li>
</ul>
<h3>Seguridad</h3>
<ul>
<li>Tomamos las precauciones necesarias para proteger tu información personal de revelaciones no autorizadas y de la intrusión de terceros. Entre algunas de estas medidas de precaución se incluyen tecnologías como firewalls y acceso seguro.</li>
</ul>
<h3>Contrato de términos de uso</h3>

<h3>Bienvenido al sitio web de project-XYZ.org.</h3>

<p>Este Contrato de términos de uso (este “Contrato”) es un contrato legal entre tú (el “Usuario”) y el programa project-XYZ (“project-XYZ.org”) que rige el uso que realizas de este sitio web. Al utilizar el sitio web project-XYZ.org el Usuario reconoce que ha leído, comprendido y que acepta cumplir los términos y condiciones de este Contrato.</p>
 <p>project-XYZ.org podría modificar estos términos y condiciones en cualquier momento. El uso continuado por parte del usuario de este sitio web representa la aceptación de los términos y condiciones vigentes en el momento del uso.</p>

<h3>Privacidad</h3>

<p>project-XYZ.org podría recopilar información sobre los Usuarios de sus sitios web. La recopilación de esta información está regida por nuestra Política de privacidad, que está disponible en una sección previa.</p>

<h3>Conducta del Usuario</h3>

<p>El Usuario reconoce que toda la información a la que el Usuario accede o publica se utilizará únicamente con fines informativos o educativos. El Usuario no podrá realizar ningún tipo de uso comercial o de cualquier otro modo no autorizado comercial de las funciones interactivas. El Usuario no participará en ninguna conducta o acción prohibida por ley o que infrinja leyes federales, estatales o locales. Los Usuarios de este sitio aceptan no distribuir, publicar, mostrar ni comunicar de ninguna otra forma ningún contenido que difame, insulte ni amenace a otras personas, que esté cargado de odio o sea ofensivo desde un punto de vista racial, o que contenga lenguaje o imágenes obscenas o indecentes, ni que contenga material con derechos de autor no autorizado o que infrinja cualquier patente, marca comercial, secreto comercial, derecho de autor o cualquier otro tipo de derecho de propiedad de cualquier parte.</p>

<h3>Identificación corporativa y marcas comerciales</h3>

<p>Todas las marcas comerciales registradas y/o no registradas y las marcas de servicio (denominadas, de forma colectiva, “Marcas”) utilizadas o a las que se haga referencia a este sitio web son propiedad de Steam, Kabam y de sus afiliados, a menos que se indique lo contrario. Los Usuarios no podrán utilizar, copiar, reproducir, volver a publicar, cargar, publicar, transmitir, distribuir o modificar estas Marcas de ninguna forma sin nuestro permiso previo por escrito. Se prohíbe el uso de nuestras Marcas en cualquier otro sitio web.</p>

<h3>Derechos de propiedad sobre el contenido</h3>

<p>Todos los materiales de este sitio web están protegidos por derechos de autor, a menos que se indique lo contrario de forma explícita. © 2011 Steam, Inc. Todos los derechos reservados.</p>

<p>El usuario reconoce y acepta que el contenido, a título enunciativo pero no limitativo, texto, software, música, sonidos, fotografías, vídeo, gráficos o cualquier otro tipo de material que contenga este sitio web (el “Contenido”) está protegido por derechos de autor, marcas comerciales, marcas de servicio, patentes y otros derechos y leyes de propiedad. El Usuario comprende y acepta que no está autorizado a copiar, reproducir, distribuir o crear obras derivadas a partir de este Contenido, ni a utilizar este Contenido de ninguna otra forma que las permitidas de forma explícita en este Contrato, sin la autorización previa y expresa de project-XYZ.org.</p>

<h3>Envíos del Usuario</h3>

<p>El Usuario acepta que todos los materiales (incluidos, a título enunciativo pero no limitativo, historias, texto imágenes) enviados a contrapasarán a ser propiedad exclusiva de project-XYZ.org, y que el Usuario no tendrá ningún tipo de derecho sobre dichos materiales. Hasta el punto en el que dichos materiales no puedan transferirse a project-XYZ.org, el Usuario otorga a Steam, a Kabam y a project-XYZ.org una licencia internacional, sin royalties y no exclusiva de modificación, uso, visualización, distribución, sublicencia y publicación de dichos materiales con cualquier fin.</p>

<h3>Vínculos a sitios de terceros</h3>

<p>Project-XYZ.org podría proporcionar a los Usuarios vínculos a otros sitios web. Estos sitios de terceros no están bajo el control de project-XYZ.org, por lo que el Usuario reconoce que ni Steam ni Kabam serán responsables del contenido, de la publicidad, de los productos ni de cualquier otro material que estuviera disponible en los sitios de los terceros mencionados. De la misma forma, el Usuario acepta que Dermalogica y joinFITE.org no serán responsables de ninguna pérdida o daño, independientemente de su magnitud, en el que se incurra debido al uso del sitio web de cualquier tercero. En términos generales, debe tenerse precaución a la hora de utilizar materiales, incluido software, incluido en sitios web, a menos que se confíe en el propietario y en la entidad que opera el sitio web.</p>

<h3>Limitación de responsabilidad</h3>

<p>EL USUARIO RECONOCE Y ACEPTA DE FORMA EXPLÍCITA QUE project-XYZ.org NO SERÁ RESPONSABLE DE NINGÚN TIPO DE PÉRDIDA O DAÑO (DIRECTOS, INDIRECTOS, PENALES, REALES, EMERGENTES, ACCIDENTALES, ESPECIALES, EXENTOS O CUALQUIER OTRO TIPO DE DAÑO) DERIVADO DEL USO O DE LA INCAPACIDAD DE USO DE ESTE SITIO WEB, NI TAMPOCO DERIVADO DE ERRORES U OMISIONES PRESENTES EN ESTE SITIO WEB, INDEPENDIENTEMENTE DE LOS HECHOS EN LOS QUE SE BASE LA RESPONSABILIDAD, NI SIQUIERA A PESAR DE QUE SE HUBIERA AVISADO A STEAM DE LA POSIBILIDAD DE DICHO DAÑO O PÉRDIDA.</p>

<p>NOTA: ALGUNAS JURISDICCIONES PODRÍAN NO PERMITIR LA EXCLUSIÓN O LIMITACIÓN DE RESPONSABILIDAD DE DAÑOS ACCIDENTALES O EMERGENTES, POR LO QUE LAS EXCLUSIONES ANTERIORES PODRÍAN NO SER DE APLICACIÓN A CIERTOS CASOS.</p>

<h3>Exención de garantías</h3>

<p>Steam no garantiza en modo alguno que este sitio web cumplirá los requisitos del Usuario o que no sufrirá interrupciones, que será oportuno ni que no presentará errores. De la misma forma Steam no garantiza en modo alguno que los resultados que pudieran obtenerse del uso de este sitio web ni sobre la precisión o fiabilidad de la información que pudiera obtenerse a través de este sitio web.</p>

<p>EL USUARIO RECONOCE Y ACEPTA QUE TODO CONTENIDO DESCARGADO O AL QUE SE ACCEDA DE CUALQUIER MODO MEDIANTE EL USO DE ESTE SITIO WEB SE REALIZA POR CUENTA Y RIESGO DEL USUARIO, Y QUE EL USUARIO SERÁ EL ÚNICO RESPONSABLE DE LOS DAÑOS PROVOCADOS AL SISTEMA INFORMÁTICO DEL USUARIO O DE LA PÉRDIDA DE DATOS DERIVADA DE LA DESCARGA DE DICHO CONTENIDO. A MENOS QUE SE INDIQUE LO CONTRARIO DE FORMA EXPLÍCITA, THE INTERNATIONAL DERMAL INSTITUTE PROPORCIONA EL CONTENIDO DE ESTE SITIO “TAL CUAL” Y “SEGÚN DISPONIBILIDAD”, Y SIN GARANTÍAS DE NINGÚN TIPO, NI EXPLÍCITAS NI IMPLÍCITAS, HASTA EL PUNTO MÁXIMO QUE PERMITA LA LEY. ESTO INCLUYE LAS GARANTÍAS IMPLÍCITAS DE COMERCIABILIDAD, NO INFRACCIÓN DE PROPIEDAD INTELECTUAL E IDONEIDAD PARA UN FIN DETERMINADO. BAJO NINGUNA CIRCUNSTANCIA THE INTERNATIONAL DERMAL INSTITUTE O SUS EMPRESAS AFILIADAS O CONTRATISTAS SERÁN RESPONSABLES DE NINGÚN TIPO DE DAÑO (INCLUIDOS, A TÍTULO ENUNCIATIVO PERO NO LIMITATIVO, DAÑOS DERIVADOS POR PÉRDIDA DE BENEFICIOS, INTERRUPCIONES DE NEGOCIO O PÉRDIDAS DE INFORMACIÓN) DERIVADAS DEL USO O DE LA IMPOSIBILIDAD DE UTILIZAR EL CONTENIDO DEL SITIO, NI SIQUIERA A PESAR DE QUE SE HUBIERA AVISADO A STEAM DE LA POSIBILIDAD DE DICHOS DAÑOS. NOTA: ALGUNAS JURISDICCIONES PODRÍAN NO PERMITIR LA EXCLUSIÓN O LIMITACIÓN DE CIERTAS GARANTÍAS, POR LO QUE LAS EXCLUSIONES ANTERIORES PODRÍAN NO SER DE APLICACIÓN A CIERTOS CASOS.</p>

<h3>Indemnización</h3>

<p>El Usuario acepta, corriendo él con los gastos, indemnizar, defender y mantener indemne a project-XYZ.org, Kabam, Steam, sus oficiales, directores, empleados, agentes, afiliados, distribuidores y licenciatarios ante todo juicio, pérdida, deficiencia, daño, responsabilidad, coste y gastos (incluidas costas y gastos razonables de abogados) en los que se incurra en conexión con o derivados de toda reclamación, demanda, pleito, acción o proceso derivado de la infracción por parte del Usuario de este Contrato o que esté relacionado con el uso por parte del usuario de este sitio web o de cualquiera de los productos o servicios relacionados con el mismo. Esta indemnización no se aplica a los productos del cuidado de la piel de la marca Steam.</p>

<h3>Jurisdicción y ley vigente</h3>

<p>Este Contrato y la relación existente entre el Usuario y project-XYZ.org deberán estar regidas e interpretadas de acuerdo con las leyes del Estado de California. Toda controversia o reclamación derivada de o en relación a este Contrato, o con el uso de este sitio web y del material que el mismo contiene, deberá resolverse en un juzgado federal o estatal del condado de Los Ángeles. El usuario acepta que, con independencia de cualquier estatuto o ley contraria, toda reclamación o causa de acción derivada de o relacionada con este Contrato deberá archivarse transcurrido un (1) año tras el comienzo de dicha reclamación o causa de acción, o quedará prohibida de forma permanente.</p>

<h3>Exención/Divisibilidad</h3>

<p>La exención por parte de cualquiera de las partes de una infracción o derecho en virtud de este Contrato no representará la exención de ninguna exención o derecho posterior. Si un juzgado de la jurisdicción competente constata que alguna de las disposiciones de este Contrato no es válida o no puede aplicarse, dicha disposición se suprimirá del resto del Contrato, que permanecerá en vigor. Arbitraje Con el uso de nuestro sitio, acepta que Dermalogica podría, según su propio criterio, exigirle que trasladara toda disputa derivada del uso de este sitio, de estos Términos y condiciones o de nuestra Política privacidad al arbitraje vinculante y definido de las Reglas de Arbitraje Internacional de JAMS, con la excepción de que, en todos los casos, se aplicará la ley de California. Toda concesión realizada en un arbitraje iniciado en virtud de esta cláusula deberá estar limitada a daños monetarios, y no deberá incluir un mandato judicial. Además, el encargado de realizar el arbitraje no tendrá ningún tipo de autoridad para conceder daños penales, emergentes ni ningún otro tipo de daño accidental.</p>

<h3>Reserva de derechos</h3>

<p>Se reservan todos los derechos que no se concedan de forma explícita en este documento.</p>
</div>
<?php
closeBody();
?>
