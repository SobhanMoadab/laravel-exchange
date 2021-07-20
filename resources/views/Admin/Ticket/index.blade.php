@include('./Admin/Layout/Header')
@include('./Admin/Layout/SidebarNav')
<main>
    <div class="container-fluid">
        <div class="row app-row">

            {{-- ########   start  Chat   ########### --}}
            <div class="col-12 chat-app">
                <div class="d-flex flex-row justify-content-between mb-3 chat-heading-container">

                    <div class="card-body pl-0 align-self-center d-flex flex-lg-row justify-content-between min-width-zero">
                        <div>
                            <a href="#">
                                <p class="list-item-heading mb-1 truncate ">Ticket Status</p>
                            </a>
                            {{-- Status Ticket (Process{ class="badge bg-info"  }, Close { class="badge bg-danger"}, Open { class="badge bg-success"} ) --}}
                            <p class="mb-0 text-muted text-small"> <span class=" badge bg-info "> Process</span> </p>
                        </div>

                        <div>
                            <a href="#">
                                {{-- User name  --}}
                                <p class="list-item-heading mb-1 truncate ">Name: <span id="heading-name"></span></p>
                            </a>
                            {{-- Date Create Ticket  --}}
                            <p class="mb-0 text-muted text-small">Ticket Created: 2021/3/4 01:24</p>
                        </div>

                        <div>
                            {{-- close Chat (delete) --}}
                            <button type="button" id="delTicket" class="btn btn-outline-danger mx-4">
                                Close the ticket
                            </button>
                        </div>

                    </div>


                </div>
                {{-- Chat Box Ticket --}}
                <div class="separator mb-5"></div>
                <div class="scroll" id="scroll-chat">
                    <div class="scroll-content chat-box ">

                        <div class="col-12 chat-app notfoundmsg">
                            <div class="scroll" id="scroll-chat">
                                <div class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                                    <div class=" d-flex align-items-center"> 
                                        <div class="d-flex flex-column text-center">
                                            <i class="iconsminds-close display-3" style="color:#eee;"></i>
                                            <span class=" w-100 my-3"> Message Not Found </span> 
                                            
                                            <button class="btn btn-outline-primary w-100" > Create Ticket  </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            {{-- ########   end Chat   ########### --}}





          
           
           

        </div>
    </div>

    <div class="app-menu">

                {{-- Modal Button  --}}
                <button class=" btn btn-primary rounded-2 w-100" type="button" data-toggle="modal" data-backdrop="static" data-target="#TicketCreate">Create New Ticket </button>
                {{-- End --}}
           
        <ul class="nav nav-tabs card-header-tabs ml-0 mr-0 my-1" role="tablist">
            <li class="nav-item w-100 text-center">
                <a class="nav-link active" id="first-tab" data-toggle="tab" href="#firstFull" role="tab"
                    aria-selected="true">Messages</a>
            </li>
        </ul>
        <div class="p-4 h-75">
            <div class="form-group">
                {{-- Sreach User Ticket --}}
                <input type="text" class="form-control rounded" placeholder="Search">
            </div>
                {{-- Ticket List  --}}

                <div class="tab-pane fade  h-100 active show" id="secondFull" role="tabpanel" aria-labelledby="second-tab">
                    <div class="scroll" id="users-list">


{{-- list User --}}

                    </div>
                </div>
            </div>
        </div>

        <a class="app-menu-button d-inline-block d-xl-none" href="#">
            <i class="simple-icon-options"></i>
        </a>
    </div>

    <div class="chat-input-container d-flex justify-content-between align-items-center">
        <input class="form-control chat-input flex-grow-1" id="chat-input" type="text" placeholder="Say something...">
        <div>
            <input id='AdminFileTickt' type='file' onchange="files" hidden />
            <button id='AdminFileTicktBtn' type="button" class="btn btn-outline-primary icon-button large">
                <i class="simple-icon-paper-clip"></i>
            </button>
            <button type="button" id="send" class="btn btn-primary icon-button large">
                <i class="simple-icon-arrow-right"></i>
            </button>

        </div>
    </div>
    {{-- Modal Add Ticket  --}}
    <div class="modal fade modal-right" id="TicketCreate" tabindex="-1" role="dialog" aria-labelledby="TicketCreate" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{-- Start Modal --}}

                <form>

                    <div class="modal-header">
                        <h5 class="modal-title">Add New Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            {{-- Ticket Title --}}
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            {{-- Ticket Msg --}}
                            <label>Message</label>
                            <textarea placeholder="" name="message" class="form-control" rows="2"></textarea>
                        </div>
                        {{-- Ticket Creator { User  or  Admin} --}}
                        <div class="form-group">
                            <label> Ticket Creator (search User)</label>
                            <input name="creator" list="Users" class="form-control selectss">
                            <datalist id="Users">
                                <option value="Admin">
                                <option value="User One">
                                <option value="Ali">
                                <option value="symon">
                                <option value="v">
                            </datalist>
                        </div>
                        {{-- Ticket Status Select Option --}}
                        <div class="form-group">
                            <label> Ticket Status</label>
                            <select name="status" class="form-control">
                                <option label="&nbsp;">&nbsp;</option>
                                <option value="Close">Close</option>
                                <option value="Open">Open</option>
                                <option value="Process">Process</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- End Modal  --}}


</main>
<script>
    // user ticket data
    var json = [
    {
        'id':1,
        'content':  [{"name":"API Evangelist - APIs", "description":"These are the APIs avilable across my work as the API Evangelist, studying the technology, business, and politics of APIs.", "image":"http://s3.amazonaws.com/kinlane-productions/api-evangelist/t-shirts/KL_InApiWeTrust-1000.png", "tags":["API", "Application Programming Interface"], "created":"2017-06-24", "modified":"2017-06-30", "url":"https://developer.apievangelist.com/apis.json", "specificationVersion":"0.14", "apis":[], "x-common":[{"type":"x-support", "url":"https://github.com/api-evangelist/master/issues"}, {"type":"x-documentation", "url":"http://management.apievangelist.com/documentation/"}, {"type":"x-github-repo", "url":"https://github.com/api-evangelist/master"}], "include":[{"name":"Definitions", "url":"http://definitions.apievangelist.com/apis.json"}, {"name":"Design", "url":"http://design.apievangelist.com/apis.json"}, {"name":"Versioning", "url":"http://versioning.apievangelist.com/apis.json"}, {"name":"Hypermedia", "url":"http://hypermedia.apievangelist.com/apis.json"}, {"name":"DNS", "url":"http://dns.apievangelist.com/apis.json"}, {"name":"Low Hanging Fruit", "url":"http://low.hanging.fruit.apievangelist.com/apis.json"}, {"name":"Scraping", "url":"http://scraping.apievangelist.com/apis.json"}, {"name":"Database", "url":"http://database.apievangelist.com/apis.json"}, {"name":"Deployment", "url":"http://deployment.apievangelist.com/apis.json"}, {"name":"Rogue", "url":"http://rogue.apievangelist.com/apis.json"}, {"name":"Microservices", "url":"http://microservices.apievangelist.com/apis.json"}, {"name":"Algorithms", "url":"http://algorithms.apievangelist.com/apis.json"}, {"name":"Search", "url":"http://search.apievangelist.com/apis.json"}, {"name":"Machine Learning", "url":"http://machine-learning.apievangelist.com/apis.json"}, {"name":"Proxy", "url":"http://proxy.apievangelist.com/apis.json"}, {"name":"Virtualization", "url":"http://virtualization.apievangelist.com/apis.json"}, {"name":"Containers", "url":"http://containers.apievangelist.com/apis.json"}, {"name":"Management", "url":"http://management.apievangelist.com/apis.json"}, {"name":"Serverless", "url":"http://serverless.apievangelist.com/apis.json"}, {"name":"Portal", "url":"http://portal.apievangelist.com/apis.json"}, {"name":"Getting Started", "url":"http://getting-started.apievangelist.com/apis.json"}, {"name":"Documentation", "url":"http://documentation.apievangelist.com/apis.json"}, {"name":"Frequently Asked Questions", "url":"http://frequently-asked-questions.apievangelist.com/apis.json"}, {"name":"Support", "url":"http://support.apievangelist.com/apis.json"}, {"name":"Communications", "url":"http://communications.apievangelist.com/apis.json"}, {"name":"Road Map", "url":"http://road-map.apievangelist.com/apis.json"}, {"name":"Issues", "url":"http://issues.apievangelist.com/apis.json"}, {"name":"Change Log", "url":"http://change-log.apievangelist.com/apis.json"}, {"name":"Monitoring", "url":"http://monitoring.apievangelist.com/apis.json"}, {"name":"Testing", "url":"http://testing.apievangelist.com/apis.json"}, {"name":"Performance", "url":"http://performance.apievangelist.com/apis.json"}, {"name":"Caching", "url":"http://caching.apievangelist.com/apis.json"}, {"name":"Reliability", "url":"http://reliability.apievangelist.com/apis.json"}, {"name":"Authentication", "url":"http://authentication.apievangelist.com/apis.json"}, {"name":"Encryption", "url":"http://encryption.apievangelist.com/apis.json"}, {"name":"Vulnerabilities", "url":"http://vulnerabilities.apievangelist.com/apis.json"}, {"name":"Breaches", "url":"http://breaches.apievangelist.com/apis.json"}, {"name":"Security", "url":"http://security.apievangelist.com/apis.json"}, {"name":"Terms of Service (TOS)", "url":"http://terms-of-service.apievangelist.com/apis.json"}, {"name":"Surveillance", "url":"http://surveillance.apievangelist.com/apis.json"}, {"name":"Privacy", "url":"http://privacy.apievangelist.com/apis.json"}, {"name":"Cybersecurity", "url":"http://cybersecurity.apievangelist.com/apis.json"}, {"name":"Reclaim", "url":"http://reclaim.apievangelist.com/apis.json"}, {"name":"Transparency", "url":"http://transparency.apievangelist.com/apis.json"}, {"name":"Observability", "url":"http://observability.apievangelist.com/apis.json"}, {"name":"Licensing", "url":"http://licensing.apievangelist.com/apis.json"}, {"name":"Copyright", "url":"http://copyright.apievangelist.com/apis.json"}, {"name":"Accessibility", "url":"http://accessibility.apievangelist.com/apis.json"}, {"name":"Branding", "url":"http://branding.apievangelist.com/apis.json"}, {"name":"Regulation", "url":"http://regulation.apievangelist.com/apis.json"}, {"name":"Patents", "url":"http://patents.apievangelist.com/apis.json"}, {"name":"Discovery", "url":"http://discovery.apievangelist.com/apis.json"}, {"name":"Client", "url":"http://client.apievangelist.com/apis.json"}, {"name":"Command Line Interface", "url":"http://command-line-interface.apievangelist.com/apis.json"}, {"name":"Bots", "url":"http://bots.apievangelist.com/apis.json"}, {"name":"Internet of Things", "url":"http://internet-of-things.apievangelist.com/apis.json"}, {"name":"Industrial", "url":"http://industrial.apievangelist.com/apis.json"}, {"name":"Network", "url":"http://network.apievangelist.com/apis.json"}, {"name":"IDE", "url":"http://ide.apievangelist.com/apis.json"}, {"name":"SDK", "url":"http://sdk.apievangelist.com/apis.json"}, {"name":"Plugin", "url":"http://plugin.apievangelist.com/apis.json"}, {"name":"Browsers", "url":"http://browsers.apievangelist.com/apis.json"}, {"name":"Embeddable", "url":"http://embeddable.apievangelist.com/apis.json"}, {"name":"Visualization", "url":"http://visualization.apievangelist.com/apis.json"}, {"name":"Analysis", "url":"http://analysis.apievangelist.com/apis.json"}, {"name":"Logging", "url":"http://logging.apievangelist.com/apis.json"}, {"name":"Aggregation", "url":"http://aggregation.apievangelist.com/apis.json"}, {"name":"iPaaS", "url":"http://ipaas.apievangelist.com/apis.json"}, {"name":"Integrations", "url":"http://integrations.apievangelist.com/apis.json"}, {"name":"Migration", "url":"http://migration.apievangelist.com/apis.json"}, {"name":"Backups", "url":"http://backups.apievangelist.com/apis.json"}, {"name":"Real Time", "url":"http://real-time.apievangelist.com/apis.json"}, {"name":"Orchestration", "url":"http://orchestration.apievangelist.com/apis.json"}, {"name":"Voice", "url":"http://voice.apievangelist.com/apis.json"}, {"name":"Spreadsheets", "url":"http://spreadsheets.apievangelist.com/apis.json"}, {"name":"Investment", "url":"http://investment.apievangelist.com/apis.json"}, {"name":"Monetization", "url":"http://monetization.apievangelist.com/apis.json"}, {"name":"Plans", "url":"http://plans.apievangelist.com/apis.json"}, {"name":"Partners", "url":"http://partners.apievangelist.com/apis.json"}, {"name":"Certification", "url":"http://certification.apievangelist.com/apis.json"}, {"name":"Acquisitions", "url":"http://acquisitions.apievangelist.com/apis.json"}, {"name":"Evangelism", "url":"http://evangelism.apievangelist.com/apis.json"}, {"name":"Showcase", "url":"http://showcase.apievangelist.com/apis.json"}, {"name":"Deprecation", "url":"http://deprecation.apievangelist.com/apis.json"}], "maintainers":[{"FN":"Kin Lane", "x-twitter":"apievangelist", "email":"info@apievangelist.com"}]}],
    },
    {
        'id':2,
        'content':  [{"name":"API Evangelist - APIs", "description":"These are the APIs avilable across my work as the API Evangelist, studying the technology, business, and politics of APIs.", "image":"http://s3.amazonaws.com/kinlane-productions/api-evangelist/t-shirts/KL_InApiWeTrust-1000.png", "tags":["API", "Application Programming Interface"], "created":"2017-06-24", "modified":"2017-06-30", "url":"https://developer.apievangelist.com/apis.json", "specificationVersion":"0.14", "apis":[], "x-common":[{"type":"x-support", "url":"https://github.com/api-evangelist/master/issues"}, {"type":"x-documentation", "url":"http://management.apievangelist.com/documentation/"}, {"type":"x-github-repo", "url":"https://github.com/api-evangelist/master"}], "include":[{"name":"Definitions", "url":"http://definitions.apievangelist.com/apis.json"}, {"name":"Design", "url":"http://design.apievangelist.com/apis.json"}, {"name":"Versioning", "url":"http://versioning.apievangelist.com/apis.json"}, {"name":"Hypermedia", "url":"http://hypermedia.apievangelist.com/apis.json"}, {"name":"DNS", "url":"http://dns.apievangelist.com/apis.json"}, {"name":"Low Hanging Fruit", "url":"http://low.hanging.fruit.apievangelist.com/apis.json"}, {"name":"Scraping", "url":"http://scraping.apievangelist.com/apis.json"}, {"name":"Database", "url":"http://database.apievangelist.com/apis.json"}, {"name":"Deployment", "url":"http://deployment.apievangelist.com/apis.json"}, {"name":"Rogue", "url":"http://rogue.apievangelist.com/apis.json"}, {"name":"Microservices", "url":"http://microservices.apievangelist.com/apis.json"}, {"name":"Algorithms", "url":"http://algorithms.apievangelist.com/apis.json"}, {"name":"Search", "url":"http://search.apievangelist.com/apis.json"}, {"name":"Machine Learning", "url":"http://machine-learning.apievangelist.com/apis.json"}, {"name":"Proxy", "url":"http://proxy.apievangelist.com/apis.json"}, {"name":"Virtualization", "url":"http://virtualization.apievangelist.com/apis.json"}, {"name":"Containers", "url":"http://containers.apievangelist.com/apis.json"}, {"name":"Management", "url":"http://management.apievangelist.com/apis.json"}, {"name":"Serverless", "url":"http://serverless.apievangelist.com/apis.json"}, {"name":"Portal", "url":"http://portal.apievangelist.com/apis.json"}, {"name":"Getting Started", "url":"http://getting-started.apievangelist.com/apis.json"}, {"name":"Documentation", "url":"http://documentation.apievangelist.com/apis.json"}, {"name":"Frequently Asked Questions", "url":"http://frequently-asked-questions.apievangelist.com/apis.json"}, {"name":"Support", "url":"http://support.apievangelist.com/apis.json"}, {"name":"Communications", "url":"http://communications.apievangelist.com/apis.json"}, {"name":"Road Map", "url":"http://road-map.apievangelist.com/apis.json"}, {"name":"Issues", "url":"http://issues.apievangelist.com/apis.json"}, {"name":"Change Log", "url":"http://change-log.apievangelist.com/apis.json"}, {"name":"Monitoring", "url":"http://monitoring.apievangelist.com/apis.json"}, {"name":"Testing", "url":"http://testing.apievangelist.com/apis.json"}, {"name":"Performance", "url":"http://performance.apievangelist.com/apis.json"}, {"name":"Caching", "url":"http://caching.apievangelist.com/apis.json"}, {"name":"Reliability", "url":"http://reliability.apievangelist.com/apis.json"}, {"name":"Authentication", "url":"http://authentication.apievangelist.com/apis.json"}, {"name":"Encryption", "url":"http://encryption.apievangelist.com/apis.json"}, {"name":"Vulnerabilities", "url":"http://vulnerabilities.apievangelist.com/apis.json"}, {"name":"Breaches", "url":"http://breaches.apievangelist.com/apis.json"}, {"name":"Security", "url":"http://security.apievangelist.com/apis.json"}, {"name":"Terms of Service (TOS)", "url":"http://terms-of-service.apievangelist.com/apis.json"}, {"name":"Surveillance", "url":"http://surveillance.apievangelist.com/apis.json"}, {"name":"Privacy", "url":"http://privacy.apievangelist.com/apis.json"}, {"name":"Cybersecurity", "url":"http://cybersecurity.apievangelist.com/apis.json"}, {"name":"Reclaim", "url":"http://reclaim.apievangelist.com/apis.json"}, {"name":"Transparency", "url":"http://transparency.apievangelist.com/apis.json"}, {"name":"Observability", "url":"http://observability.apievangelist.com/apis.json"}, {"name":"Licensing", "url":"http://licensing.apievangelist.com/apis.json"}, {"name":"Copyright", "url":"http://copyright.apievangelist.com/apis.json"}, {"name":"Accessibility", "url":"http://accessibility.apievangelist.com/apis.json"}, {"name":"Branding", "url":"http://branding.apievangelist.com/apis.json"}, {"name":"Regulation", "url":"http://regulation.apievangelist.com/apis.json"}, {"name":"Patents", "url":"http://patents.apievangelist.com/apis.json"}, {"name":"Discovery", "url":"http://discovery.apievangelist.com/apis.json"}, {"name":"Client", "url":"http://client.apievangelist.com/apis.json"}, {"name":"Command Line Interface", "url":"http://command-line-interface.apievangelist.com/apis.json"}, {"name":"Bots", "url":"http://bots.apievangelist.com/apis.json"}, {"name":"Internet of Things", "url":"http://internet-of-things.apievangelist.com/apis.json"}, {"name":"Industrial", "url":"http://industrial.apievangelist.com/apis.json"}, {"name":"Network", "url":"http://network.apievangelist.com/apis.json"}, {"name":"IDE", "url":"http://ide.apievangelist.com/apis.json"}, {"name":"SDK", "url":"http://sdk.apievangelist.com/apis.json"}, {"name":"Plugin", "url":"http://plugin.apievangelist.com/apis.json"}, {"name":"Browsers", "url":"http://browsers.apievangelist.com/apis.json"}, {"name":"Embeddable", "url":"http://embeddable.apievangelist.com/apis.json"}, {"name":"Visualization", "url":"http://visualization.apievangelist.com/apis.json"}, {"name":"Analysis", "url":"http://analysis.apievangelist.com/apis.json"}, {"name":"Logging", "url":"http://logging.apievangelist.com/apis.json"}, {"name":"Aggregation", "url":"http://aggregation.apievangelist.com/apis.json"}, {"name":"iPaaS", "url":"http://ipaas.apievangelist.com/apis.json"}, {"name":"Integrations", "url":"http://integrations.apievangelist.com/apis.json"}, {"name":"Migration", "url":"http://migration.apievangelist.com/apis.json"}, {"name":"Backups", "url":"http://backups.apievangelist.com/apis.json"}, {"name":"Real Time", "url":"http://real-time.apievangelist.com/apis.json"}, {"name":"Orchestration", "url":"http://orchestration.apievangelist.com/apis.json"}, {"name":"Voice", "url":"http://voice.apievangelist.com/apis.json"}, {"name":"Spreadsheets", "url":"http://spreadsheets.apievangelist.com/apis.json"}, {"name":"Investment", "url":"http://investment.apievangelist.com/apis.json"}, {"name":"Monetization", "url":"http://monetization.apievangelist.com/apis.json"}, {"name":"Plans", "url":"http://plans.apievangelist.com/apis.json"}, {"name":"Partners", "url":"http://partners.apievangelist.com/apis.json"}, {"name":"Certification", "url":"http://certification.apievangelist.com/apis.json"}, {"name":"Acquisitions", "url":"http://acquisitions.apievangelist.com/apis.json"}, {"name":"Evangelism", "url":"http://evangelism.apievangelist.com/apis.json"}, {"name":"Showcase", "url":"http://showcase.apievangelist.com/apis.json"}, {"name":"Deprecation", "url":"http://deprecation.apievangelist.com/apis.json"}], "maintainers":[{"FN":"Kin Lane", "x-twitter":"apievangelist", "email":"info@apievangelist.com"}]}],
    },
    {
        'id':3,
        'content':  [{"name":"API Evangelist - APIs", "description":"These are the APIs avilable across my work as the API Evangelist, studying the technology, business, and politics of APIs.", "image":"http://s3.amazonaws.com/kinlane-productions/api-evangelist/t-shirts/KL_InApiWeTrust-1000.png", "tags":["API", "Application Programming Interface"], "created":"2017-06-24", "modified":"2017-06-30", "url":"https://developer.apievangelist.com/apis.json", "specificationVersion":"0.14", "apis":[], "x-common":[{"type":"x-support", "url":"https://github.com/api-evangelist/master/issues"}, {"type":"x-documentation", "url":"http://management.apievangelist.com/documentation/"}, {"type":"x-github-repo", "url":"https://github.com/api-evangelist/master"}], "include":[{"name":"Definitions", "url":"http://definitions.apievangelist.com/apis.json"}, {"name":"Design", "url":"http://design.apievangelist.com/apis.json"}, {"name":"Versioning", "url":"http://versioning.apievangelist.com/apis.json"}, {"name":"Hypermedia", "url":"http://hypermedia.apievangelist.com/apis.json"}, {"name":"DNS", "url":"http://dns.apievangelist.com/apis.json"}, {"name":"Low Hanging Fruit", "url":"http://low.hanging.fruit.apievangelist.com/apis.json"}, {"name":"Scraping", "url":"http://scraping.apievangelist.com/apis.json"}, {"name":"Database", "url":"http://database.apievangelist.com/apis.json"}, {"name":"Deployment", "url":"http://deployment.apievangelist.com/apis.json"}, {"name":"Rogue", "url":"http://rogue.apievangelist.com/apis.json"}, {"name":"Microservices", "url":"http://microservices.apievangelist.com/apis.json"}, {"name":"Algorithms", "url":"http://algorithms.apievangelist.com/apis.json"}, {"name":"Search", "url":"http://search.apievangelist.com/apis.json"}, {"name":"Machine Learning", "url":"http://machine-learning.apievangelist.com/apis.json"}, {"name":"Proxy", "url":"http://proxy.apievangelist.com/apis.json"}, {"name":"Virtualization", "url":"http://virtualization.apievangelist.com/apis.json"}, {"name":"Containers", "url":"http://containers.apievangelist.com/apis.json"}, {"name":"Management", "url":"http://management.apievangelist.com/apis.json"}, {"name":"Serverless", "url":"http://serverless.apievangelist.com/apis.json"}, {"name":"Portal", "url":"http://portal.apievangelist.com/apis.json"}, {"name":"Getting Started", "url":"http://getting-started.apievangelist.com/apis.json"}, {"name":"Documentation", "url":"http://documentation.apievangelist.com/apis.json"}, {"name":"Frequently Asked Questions", "url":"http://frequently-asked-questions.apievangelist.com/apis.json"}, {"name":"Support", "url":"http://support.apievangelist.com/apis.json"}, {"name":"Communications", "url":"http://communications.apievangelist.com/apis.json"}, {"name":"Road Map", "url":"http://road-map.apievangelist.com/apis.json"}, {"name":"Issues", "url":"http://issues.apievangelist.com/apis.json"}, {"name":"Change Log", "url":"http://change-log.apievangelist.com/apis.json"}, {"name":"Monitoring", "url":"http://monitoring.apievangelist.com/apis.json"}, {"name":"Testing", "url":"http://testing.apievangelist.com/apis.json"}, {"name":"Performance", "url":"http://performance.apievangelist.com/apis.json"}, {"name":"Caching", "url":"http://caching.apievangelist.com/apis.json"}, {"name":"Reliability", "url":"http://reliability.apievangelist.com/apis.json"}, {"name":"Authentication", "url":"http://authentication.apievangelist.com/apis.json"}, {"name":"Encryption", "url":"http://encryption.apievangelist.com/apis.json"}, {"name":"Vulnerabilities", "url":"http://vulnerabilities.apievangelist.com/apis.json"}, {"name":"Breaches", "url":"http://breaches.apievangelist.com/apis.json"}, {"name":"Security", "url":"http://security.apievangelist.com/apis.json"}, {"name":"Terms of Service (TOS)", "url":"http://terms-of-service.apievangelist.com/apis.json"}, {"name":"Surveillance", "url":"http://surveillance.apievangelist.com/apis.json"}, {"name":"Privacy", "url":"http://privacy.apievangelist.com/apis.json"}, {"name":"Cybersecurity", "url":"http://cybersecurity.apievangelist.com/apis.json"}, {"name":"Reclaim", "url":"http://reclaim.apievangelist.com/apis.json"}, {"name":"Transparency", "url":"http://transparency.apievangelist.com/apis.json"}, {"name":"Observability", "url":"http://observability.apievangelist.com/apis.json"}, {"name":"Licensing", "url":"http://licensing.apievangelist.com/apis.json"}, {"name":"Copyright", "url":"http://copyright.apievangelist.com/apis.json"}, {"name":"Accessibility", "url":"http://accessibility.apievangelist.com/apis.json"}, {"name":"Branding", "url":"http://branding.apievangelist.com/apis.json"}, {"name":"Regulation", "url":"http://regulation.apievangelist.com/apis.json"}, {"name":"Patents", "url":"http://patents.apievangelist.com/apis.json"}, {"name":"Discovery", "url":"http://discovery.apievangelist.com/apis.json"}, {"name":"Client", "url":"http://client.apievangelist.com/apis.json"}, {"name":"Command Line Interface", "url":"http://command-line-interface.apievangelist.com/apis.json"}, {"name":"Bots", "url":"http://bots.apievangelist.com/apis.json"}, {"name":"Internet of Things", "url":"http://internet-of-things.apievangelist.com/apis.json"}, {"name":"Industrial", "url":"http://industrial.apievangelist.com/apis.json"}, {"name":"Network", "url":"http://network.apievangelist.com/apis.json"}, {"name":"IDE", "url":"http://ide.apievangelist.com/apis.json"}, {"name":"SDK", "url":"http://sdk.apievangelist.com/apis.json"}, {"name":"Plugin", "url":"http://plugin.apievangelist.com/apis.json"}, {"name":"Browsers", "url":"http://browsers.apievangelist.com/apis.json"}, {"name":"Embeddable", "url":"http://embeddable.apievangelist.com/apis.json"}, {"name":"Visualization", "url":"http://visualization.apievangelist.com/apis.json"}, {"name":"Analysis", "url":"http://analysis.apievangelist.com/apis.json"}, {"name":"Logging", "url":"http://logging.apievangelist.com/apis.json"}, {"name":"Aggregation", "url":"http://aggregation.apievangelist.com/apis.json"}, {"name":"iPaaS", "url":"http://ipaas.apievangelist.com/apis.json"}, {"name":"Integrations", "url":"http://integrations.apievangelist.com/apis.json"}, {"name":"Migration", "url":"http://migration.apievangelist.com/apis.json"}, {"name":"Backups", "url":"http://backups.apievangelist.com/apis.json"}, {"name":"Real Time", "url":"http://real-time.apievangelist.com/apis.json"}, {"name":"Orchestration", "url":"http://orchestration.apievangelist.com/apis.json"}, {"name":"Voice", "url":"http://voice.apievangelist.com/apis.json"}, {"name":"Spreadsheets", "url":"http://spreadsheets.apievangelist.com/apis.json"}, {"name":"Investment", "url":"http://investment.apievangelist.com/apis.json"}, {"name":"Monetization", "url":"http://monetization.apievangelist.com/apis.json"}, {"name":"Plans", "url":"http://plans.apievangelist.com/apis.json"}, {"name":"Partners", "url":"http://partners.apievangelist.com/apis.json"}, {"name":"Certification", "url":"http://certification.apievangelist.com/apis.json"}, {"name":"Acquisitions", "url":"http://acquisitions.apievangelist.com/apis.json"}, {"name":"Evangelism", "url":"http://evangelism.apievangelist.com/apis.json"}, {"name":"Showcase", "url":"http://showcase.apievangelist.com/apis.json"}, {"name":"Deprecation", "url":"http://deprecation.apievangelist.com/apis.json"}], "maintainers":[{"FN":"Kin Lane", "x-twitter":"apievangelist", "email":"info@apievangelist.com"}]}],
    },
];
// console.log(json)
var url = 'http://api.alquran.cloud/v1/quran/en.asad';
$.ajax(url, function(d){
}).done(function(d){
    $.each(d.data.surahs, function (i, item) {
                    $('#users-list').append(`
                                        <div class="d-flex flex-row mb-3 border-bottom pb-3">
                                            <a class="d-flex" href="#">
                                                <img alt="Profile Picture" src="/Admin/img/profiles/l-1.jpg" class="img-thumbnail border-0 rounded-circle mr-3 list-thumbnail align-self-center xsmall">
                                            </a>
                                            {{-- @foreach($users as $index=>$user)
                                            @if(!empty($users[$index]['tickets'])) --}}
                                            <div onclick="get_user_tickets(${item.number})" class="d-flex flex-grow-1 min-width-zero">
                                                <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero ">
                                                    <div class="min-width-zero ">
                                                        <div class="d-flex justify-content-between ">
                                                            <a href="#" class="">
                                                                {{-- User Name --}}
                                                                <p class="mb-0 truncate"> ${item.englishName}
                                                                    {{-- {{$users[$index]['email']}} --}}

                                                                </p>

                                                            </a>
                                                        </div>
                                                        {{-- Ticket Title --}}
                                                        <p class="mb-0 text- "> ${item.englishNameTranslation}
                                                            {{-- {{$users[$index]['tickets'][0]['content']}} --}}
                                                        </p>
                                                    </div>
                                                    <span class=" badge badge-primary status-ticket">&nbsp;</span>

                                                </div>
                                            </div>
                                            {{-- @endif
                                            @endforeach --}}
                                        </div>
                    
                    `)  
    })
})

function get_user_tickets(event){
    $('.notfoundmsg').remove();
    $('.chat-remove').remove();
    $("#scroll-chat").scrollTop(0);

    $('.chat-box').append(`
        
        <div class="col-12 chat-app notfoundmsg">
                    <div class="scroll" id="scroll-chat">
                        <div class="scroll-content chat-box d-flex align-item-center justify-content-center h-100">
                            <div class=" d-flex align-items-center"> 
                                <div class="d-flex flex-column text-center">
                                    <div class="loadingio-spinner-rolling-z71busg6ach"><div class="ldio-noxuww260un">
                                            <div></div>
                                            </div></div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
        `);

    $.ajax(url, function(d){
       
    }).done(function(d){
    var datas = d.data.surahs.filter(function(data){
        return data.number == event })
            $('#heading-name').html(datas[0].englishName);
            $.each(datas[0].ayahs , function (i, msg) {
                     $('.notfoundmsg').remove();
                    $('.chat-box').append(`
                                        <div class="card d-inline-block mb-3 float-right mr-2 chat-remove">
                                            <div class="position-absolute pt-1 pr-2 r-0">
                                                <span class="text-extra-small text-muted">09:41</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="chat-text-left">
                                                    <p class="mb-0 text-semi-muted">
                                                    ${msg.text}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfixs chat-remove"></div>
                    
                    `)
                    var elements = document.getElementById("scroll-chat");
                    elements.scrollTop = elements.scrollHeight;
            })
    })
}

    document.getElementById('AdminFileTicktBtn').addEventListener('click', fileupload);

    function fileupload() {
        document.getElementById('AdminFileTickt').click();
    }
    document.getElementById('send').addEventListener('click', sendMsg);
    document.getElementById('chat-input').addEventListener("keyup", function(event) {
        document.getElementById('send').classList.add('active-send')
        if (this.value == '') {
            document.getElementById('send').classList.remove('active-send')
        }
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById('send').click()
            document.getElementById('send').classList.remove('active-send')


        }
    });

    function sendMsg() {
        document.getElementById('send').classList.remove('active-send')
        var msg = $('.chat-input').val()
        if (!msg == '') {
            $('.chat-box').append(`
                <div class="card d-inline-block mb-3 float-right mr-2">
                    <div class="position-absolute pt-1 pr-2 r-0">
                        <span class="text-extra-small text-muted">09:41</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row pb-2">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div
                                    class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero">
                                    <div class="min-width-zero">
                                        <p class="mb-0 list-item-heading truncate">Admin</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="chat-text-left">
                            <p class="mb-0 text-semi-muted">
                            ${msg}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfixs"></div>`)
                    $('.chat-input').val('');
                    var elements = document.getElementById("scroll-chat");
                    elements.scrollTop = elements.scrollHeight;
                }
            }
            document.getElementById('delTicket').addEventListener("click", function() {
                swal({
                        title: "Are you sure?",
                        text: "Once Close",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $('.chat-remove').remove();

                            swal("Ticket Closed !", {
                                icon: "success",
                            });
                        } else {
                            swal("Your  Ticket is safe!");
                        }
                    });
               
            });

       

 
</script>
@include('./Admin/Layout/Footer')