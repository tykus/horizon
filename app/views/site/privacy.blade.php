@extends('layouts.site')

@section('content')
  <div class="container">
    <h1>Privacy Statement</h1>

    <p><strong>Website of {{ Config::get('site.business.name') }}</strong></p>
    <p>This statement relates to our privacy practices in connection with this website. We are not responsible for the content or privacy practices of other websites. Any external links to other websites are clearly identifiable as such.</p>

    <p><strong>General statement</strong></p>
    <p>{{ Config::get('site.business.name') }} fully respects your right to privacy, and will not collect any personal information about you on this website without your clear permission. Any personal information which you volunteer to the Commissioner will be treated with the highest standards of security and confidentiality, strictly in accordance with the Data Protection Acts, 1988 & 2003.</p>

    <p><strong>Collection and use of personal information</strong></p>
    <p>{{ Config::get('site.business.name') }} does not collect any personal data about you on this website, apart from information which you volunteer (for example by using our online feedback form). Any information which you provide in this way is not made available to any third parties, and is used by the Commissioner only in line with the purpose for which you provided it.Your personal data may also be anonymised and used for statistical purposes.</p>

    <p><strong>Requests regarding data supplied via this website</strong></p>
    <p>On request, we supply copies of your personal data which you may have supplied via this website. If you wish to obtain such copies, you must write to {{ Config::get('site.business.name') }} at the address below, or e-mail him at info@dataprotection.ie. You should include any personal  identifiers which you supplied earlier via the website (e.g. Name; address; phone number; e-mail address). Your request will be dealt with as soon as possible and will take not more than 40 days to process.</p>
    <p>If you discover that this office holds inaccurate information about you, you can request {{ Config::get('site.business.name') }} to correct that information. Such a request must be in writing or via e-mail.</p>
    <p>In certain circumstances, you may also request that data which you have supplied via the website be deleted. If you wish to request a deletion, you would generally be expected to identify some contravention of data protection law in the manner in which this office processes the data concerned.</p>

    <p><strong>Complaints about data processed via the website.</strong></p>
    <p>If you are concerned about how personal data are processed via this website, please do not hesitate to bring such concerns to the attention of {{ Config::get('site.business.name') }} at the contact details below.</p>

    <p><strong>Collection and use of technical information</strong></p>
    <p>This website uses what is called a session cookie. This cookie (USERLANG) is used while you are on our website to record the language version of the site you are looking at. There are only 2 settings for this cookie, USERLANG = EN or USERLANG = GA. This is done solely to ensure that you are presented with the correct language version of any page you request.</p>
    <p>This cookie is only stored in your browser memory while you are visiting our website. It automatically deletes itself after 20 minutes of inactivity on our site or immediately on closing your browser and there is no record of the cookie stored on your computer</p>
  </div>
@stop
