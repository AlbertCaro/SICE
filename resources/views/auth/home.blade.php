@extends('layouts.main')

@section('title', 'Inicio')
@section('type', 'landing-page')

@section('content')
    <div class="page-header header-filter" data-parallax="true" style=" background-image: url('{{ asset('assets/img/kit/cita.jpg') }}'); ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">SICE CUValles</h1>
                    <h4>Sistema de Información de la Comunidad Estudiantil</h4>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Sistema de Información de la Comunidad Estudiantil</h2>
                        <h5 style="text-align: justify" class="description">El <strong>P</strong>ograma de <strong>F</strong>ormación, <strong>A</strong>ctualización y <strong>Ca</strong>pacitación <strong>D</strong>ocente (PROFACAD) tiene como objetivo actualizar al personal académico de la Universidad de Guadalajara en el marco de las tendencias, exigencias y demandas que el entorno plantea a las Instituciones de Educación Superior en el Siglo XXI. La institución busca que el personal académico sea capaz de diseñar proyectos curriculares de manera creativa e innovadora, generando estrategias didácticas en las que utilicen las tecnologías de la información y comunicación que su práctica docente requiera y teniendo como referente el aprendizaje centrado en sus estudiantes, a fin de incidir en la mejora continua de las prácticas docentes y de los procesos de formación profesional.</h5>
                        <h5 style="text-align: justify" class="description">La Universidad de Guadalajara contrató en 2014 al Consejo Mexicano de Investigación Educativa (COMIE) para que diseñara una propuesta de formación para el profesorado de nuestra Institución. La propuesta original del COMIE constaba de cuatro grandes áreas: la primera sobre el aprendizaje centrado en el estudiante, que es acorde al modelo educativo que la Universidad promueve; una segunda área sobre tecnologías educativas y dos más sobre didácticas: introducción la didáctica y formación con base en solución de problema orientados a proyectos. Esta propuesta se enriqueció con las aportaciones de los Rectores de Centro que conformaron la Comisión para el diseño y estructuración de la Propuesta de Formación, Actualización y Capacitación Docente, así como con diversos documentos utilizados para diseñarla, en especial aquellos referidos a las habilidades y tendencias de formadores elaborados por la Academia de Ciencias de Estados Unidos y otro más sobre las habilidades necesarias para los futuros profesionales, que fue trabajado por la Universidad de Oxford en Gran Bretaña.</h5>
                        <h5 style="text-align: justify" class="description">Así, la formación y actualización docente cobra relevancia debido a que el profesor es un sujeto clave en el proceso enseñanza–aprendizaje, y esa es también la razón fundamental por la que este programa se enfoca en contribuir para que los profesores cumplan con el perfil que requiere el modelo educativo de nuestra Casa de Estudios.
                        </h5>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Evaluación y Acreditación de los Cursos – Talleres</h4>
                                <p style="text-align: justify">De acuerdo con los criterios de acreditación de talleres en el marco del PROFACAD, los profesores que participen en dichos talleres, deben cumplir en tiempo y forma con el 100% de asistencias (firmar las listas de asistencia correspondientes) y productos programados por el asesor. Deben integrar un portafolio electrónico y deben elaborar una reflexión que se identifica como "producto final".</p>

                                <p style="text-align: justify">El instructor entregará a la dependencia responsable un formato con la evaluación de todas las actividades realizadas por cada profesor y especificará si el profesor aprobó o no el taller.</p>

                                <p style="text-align: justify">Los profesores que cumplan estos criterios de acreditación, obtendrán su constancia del taller que será tramitada por la dependencia encargada de impartir el taller y validada por la CGA. En caso contrario no se entregarán constancias.</p>

                                <p style="text-align: justify">Es importante señalar que, si el profesor no se presenta en el lugar, a la hora y el día señalado de la primera sesión presencial, se le dará de baja del curso y en su lugar podrá entrar otro profesor que se encuentre en la lista de espera (la tolerancia será solo de 30 minutos después de la hora señalada).
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">access_time</i>
                                </div>
                                <h4 class="info-title">Lista de espera</h4>
                                <p style="text-align: justify">Los talleres tienen un mínimo de 15 profesores y un máximo de 25, si en uno éstos está agotado el cupo y el profesor está interesado en dicho taller, podrá registrarse en una lista de espera. Si algún profesor inscrito a ese taller desiste, entrará al taller el siguiente profesor en la lista de espera.</p>

                                <p style="text-align: justify">   En caso de que algún profesor no se presente en el lugar, a la hora y el día señalado de la primera sesión presencial, se le dará de baja del taller y en su lugar podrá entrar el siguiente profesor que se encuentre en la lista de espera y esté presente en dicha sesión (la tolerancia será solo de 30 minutos después de la hora señalada).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop