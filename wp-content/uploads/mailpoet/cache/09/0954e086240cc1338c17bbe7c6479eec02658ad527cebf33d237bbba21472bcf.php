<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* old_settings.html */
class __TwigTemplate_de7be866cdf2a88a1831aa7d0cbc7f96f0bac31f2f38d183ab331425eae13af9 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'translations' => [$this, 'block_translations'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("layout.html", "old_settings.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "  <div id=\"mailpoet_settings\">

    <h1 class=\"title\">";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Settings");
        echo "</h1>

    <!-- settings form  -->
    <form
      id=\"mailpoet_settings_form\"
      name=\"mailpoet_settings_form\"
      class=\"mailpoet_form\"
      autocomplete=\"off\"
      novalidate
    >
      <!-- tabs -->
      <h2 class=\"nav-tab-wrapper\" id=\"mailpoet_settings_tabs\">
        <a class=\"nav-tab\" href=\"?page=mailpoet-new-settings#/basics\" data-automation-id=\"basic_settings_tab\">";
        // line 18
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Basics");
        echo "</a>
        <a class=\"nav-tab\" href=\"?page=mailpoet-new-settings#signup\" data-automation-id=\"signup_settings_tab\">";
        // line 19
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign-up Confirmation");
        echo "</a>
        <a class=\"nav-tab\" href=\"#mta\" data-automation-id=\"send_with_settings_tab\">";
        // line 20
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Send With...");
        echo "</a>
        ";
        // line 21
        if (($context["is_woocommerce_active"] ?? null)) {
            // line 22
            echo "          <a class=\"nav-tab\" href=\"?page=mailpoet-new-settings#/woocommerce\" data-automation-id=\"woocommerce_settings_tab\">";
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("WooCommerce");
            echo "</a>
        ";
        }
        // line 24
        echo "        <a class=\"nav-tab\" href=\"?page=mailpoet-new-settings#/advanced\" data-automation-id=\"settings-advanced-tab\">";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Advanced");
        echo "</a>
        <a class=\"nav-tab nav-tab-reload\" href=\"?page=mailpoet-new-settings#premium\" data-automation-id=\"activation_settings_tab\">";
        // line 25
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Key Activation");
        echo "</a>
      </h2>

      <!-- sending method -->
      <div data-tab=\"mta\" class=\"mailpoet_tab_panel\">
        ";
        // line 30
        $this->loadTemplate("settings/mta.html", "old_settings.html", 30)->display($context);
        // line 31
        echo "      </div>

      <p class=\"submit mailpoet_settings_submit\" style=\"display:none;\">
        <input
          type=\"submit\"
          class=\"button button-primary\"
          name=\"submit\"
          data-automation-id=\"settings-submit-button\"
          value=\"";
        // line 39
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save settings");
        echo "\"
        />
      </p>
    </form>
  </div>

  <script type=\"text/javascript\">
    jQuery(function(\$) {
      // on dom loaded
      \$(function() {
        // on form submission
        \$('#mailpoet_settings_form').on('submit', function() {
          var errorFound = false;
          // Check if filled emails are valid
          var invalidEmails = \$.map(\$('#mailpoet_settings_form')[0].elements, function(el) {
            return el.type === 'email' && el.value && !window.mailpoet_email_regex.test(el.value) ? el.value : null;
          }).filter(function(val) { return !!val; });
          if (invalidEmails.length) {
            MailPoet.Notice.error(
              \"";
        // line 58
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Invalid email addresses: "), "js"), "html", null, true);
        echo "\" + invalidEmails.join(', '),
              { scroll: true }
            );
            errorFound = true;
          }

          // stop processing if an error was found
          if (errorFound) {
            return false;
          }
          // if we're setting up a sending method, try to activate it
          if (\$('.mailpoet_mta_setup_save').is(':visible')) {
            \$('.mailpoet_mta_setup_save').trigger('click');
          }
          saveSettings();
          return false;
        });

        function saveSettings() {
          // serialize form data
          var settings_data = \$('#mailpoet_settings_form').mailpoetSerializeObject();

          // show loading screen
          MailPoet.Modal.loading(true);

          MailPoet.Ajax.post({
            api_version: window.mailpoet_api_version,
            endpoint: 'settings',
            action: 'set',
            data: settings_data
          }).always(function() {
            MailPoet.Modal.loading(false);
          }).done(function(response) {
            MailPoet.Notice.success(
              \"";
        // line 92
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Settings saved"), "js"), "html", null, true);
        echo "\",
              { scroll: true }
            );
            MailPoet.trackEvent(
              'User has saved Settings',
              {
                'MailPoet Free version': window.mailpoet_version,
                'Sending method type': settings_data.mta_group || null,
                'Sending frequency (emails)': settings_data.mta_group != 'mailpoet' && settings_data.mta && settings_data.mta.frequency && settings_data.mta.frequency.emails,
                'Sending frequency (interval)': settings_data.mta_group != 'mailpoet' && settings_data.mta && settings_data.mta.frequency && settings_data.mta.frequency.interval,
                'Sending provider': settings_data.mta_group == 'smtp' && settings_data.smtp_provider,
                'Sign-up confirmation enabled': (settings_data.signup_confirmation && settings_data.signup_confirmation.enabled == true),
                'Bounce email is present': (settings_data.bounce && settings_data.bounce.address != \"\"),
                ";
        // line 105
        if (($context["is_woocommerce_active"] ?? null)) {
            // line 106
            echo "                'WooCommerce email customizer enabled': (settings_data.woocommerce && settings_data.woocommerce.use_mailpoet_editor),
                ";
        }
        // line 108
        echo "                'Newsletter task scheduler method': (settings_data.cron_trigger && settings_data.cron_trigger.method)
              }
            );
          }).fail(function(response) {
            if (response.errors.length > 0) {
              MailPoet.Notice.error(
                response.errors.map(function(error) { return error.message; }),
                { scroll: true }
              );
            }
          });
        }

        // setup toggle checkboxes
        function toggleContent() {
          \$('#'+\$(this).data('toggle'))[
            (\$(this).is(':checked'))
            ? 'show'
            : 'hide'
          ]();
        }

        \$(document).on('click', 'input[data-toggle]', toggleContent);
        \$('input[data-toggle]').each(toggleContent);

        function toggleReCaptchaSettings() {
          if (\$('input[name=\"captcha[type]\"]:checked').val() == 'recaptcha') {
            \$('#settings_recaptcha_tokens').show();
          } else {
            \$('#settings_recaptcha_tokens').hide();
          }
        }
        \$('input[name=\"captcha[type]\"]').on('click', toggleReCaptchaSettings);
        toggleReCaptchaSettings();
        \$('#settings_recaptcha_tokens_error').hide();

        \$('#settings_subscriber_email_notification_error').hide();
        \$('#settings_stats_notifications_error').hide();

        ";
        // line 147
        if (($context["is_woocommerce_active"] ?? null)) {
            // line 148
            echo "          \$('#settings_woocommerce_optin_on_checkout_error').hide();

          \$('.mailpoet_woocommerce_editor_button').on('click', function() {
            var emailId = \"";
            // line 151
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "woocommerce", []), "transactional_email_id", []), "html", null, true);
            echo "\";
            if (!emailId) {
              MailPoet.Ajax.post({
                api_version: window.mailpoet_api_version,
                endpoint: 'settings',
                action: 'set',
                data: {
                  'woocommerce.use_mailpoet_editor': 1,
                },
              }).done(function (response) {
                emailId = response.data.woocommerce.transactional_email_id;
                window.location.href = '?page=mailpoet-newsletter-editor&id=' + emailId;
              }).fail(function (response) {
                MailPoet.Notice.showApiErrorNotice(response, { scroll: true });
              });
            } else {
              window.location.href = '?page=mailpoet-newsletter-editor&id=' + emailId;
            }
          });
        ";
        }
        // line 171
        echo "
        function toggleLinuxCronSettings() {
          if (\$('input[name=\"cron_trigger[method]\"]:checked').val() === '";
        // line 173
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["cron_trigger"] ?? null), "linux_cron", []), "html", null, true);
        echo "') {
            \$('#settings_linux_cron').show();
          } else {
            \$('#settings_linux_cron').hide();
          }
        }
        \$('input[name=\"cron_trigger[method]\"]').on('click', toggleLinuxCronSettings);
        toggleLinuxCronSettings();

        // page preview
        \$('.mailpoet_page_preview').on('click', function() {
          var selection = \$(this).siblings('.mailpoet_page_selection');

          if (selection.length > 0) {
            \$(this).attr('href', \$(selection).find('option[value=\"'+\$(selection).val()+'\"]').data('preview-url'));
            \$(this).attr('target', '_blank');
          } else {
            \$(this).attr('href', 'javascript:;');
            \$(this).removeAttr('target');
          }
        });
      });
    });
    ";
        // line 196
        $context["newUser"] = (((($context["is_new_user"] ?? null) == true)) ? ("true") : ("false"));
        // line 197
        echo "    ";
        // line 198
        echo "      var mailpoet_is_new_user = ";
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["newUser"] ?? null), "js", null, true);
        echo ";
      var mailpoet_settings_sender_name = \"";
        // line 199
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sender", []), "name", []), "js", null, true);
        echo "\";
      var mailpoet_settings_sender_adddress = \"";
        // line 200
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sender", []), "address", []), "js", null, true);
        echo "\";
      var mailpoet_settings_reply_to_name = \"";
        // line 201
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "reply_to", []), "name", []), "js", null, true);
        echo "\";
      var mailpoet_settings_reply_to_address = \"";
        // line 202
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "reply_to", []), "address", []), "js", null, true);
        echo "\";
      var mailpoet_settings_signup_confirmation_name = \"";
        // line 203
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", []), "from", []), "name", []), "js", null, true);
        echo "\";
      var mailpoet_settings_signup_confirmation_address = \"";
        // line 204
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "signup_confirmation", []), "from", []), "address", []), "js", null, true);
        echo "\";
      var mailpoet_installed_at = '";
        // line 205
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "installed_at", []), "js", null, true);
        echo "';
      var mailpoet_mss_active = ";
        // line 206
        echo json_encode(($this->getAttribute(($context["settings"] ?? null), "mta_group", []) == "mailpoet"));
        echo ";
    ";
        // line 208
        echo "    var mailpoet_beacon_articles = [
      '57f71d49c697911f2d323486',
      '57fb0e1d9033600277a681ca',
      '57f49a929033602e61d4b9f4',
      '57fb134cc697911f2d323e3b',
    ];
  </script>
";
    }

    // line 216
    public function block_translations($context, array $blocks = [])
    {
        // line 217
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["reinstallConfirmation" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Are you sure? All of your MailPoet data will be permanently erased (newsletters, statistics, subscribers, etc.)."), "announcementHeader" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Get notified when someone subscribes"), "announcementParagraph1" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("It’s been a popular feature request from our users, we hope you get lots of emails about all your new subscribers!"), "announcementParagraph2" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("(You can turn this feature off if it’s too many emails.)"), "yourName" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your name"), "from" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("From"), "replyTo" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Reply-to"), "premiumTabActivationKeyLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activation Key", "mailpoet"), "premiumTabDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This key is used to validate your free or paid subscription. Paying customers will enjoy automatic upgrades of their Premium plugin and access to faster support.", "mailpoet"), "premiumTabNoKeyNotice" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please specify a license key before validating it.", "mailpoet"), "premiumTabVerifyButton" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Verify", "mailpoet"), "premiumTabKeyValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is valid", "mailpoet"), "premiumTabKeyNotValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is not valid", "mailpoet"), "premiumTabPremiumActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is active", "mailpoet"), "premiumTabPremiumInstallingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium plugin is being installed", "mailpoet"), "premiumTabPremiumActivatingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium plugin is being activated", "mailpoet"), "premiumTabPremiumNotInstalledMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is not installed.", "mailpoet"), "premiumTabPremiumInstallMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Install MailPoet Premium plugin", "mailpoet"), "premiumTabPremiumNotActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is not active.", "mailpoet"), "premiumTabPremiumActivateMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activate MailPoet Premium plugin", "mailpoet"), "premiumTabPremiumInstallationInstallingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("downloading MailPoet Premium…", "mailpoet"), "premiumTabPremiumInstallationActivatingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("activating MailPoet Premium…", "mailpoet"), "premiumTabPremiumInstallationActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is active!", "mailpoet"), "premiumTabPremiumInstallationErrorMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Something went wrong. Please [link]download the Premium plugin from your account[/link] and [link]contact our support team[/link].", "mailpoet"), "premiumTabPremiumKeyNotValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is not valid for MailPoet Premium", "mailpoet"), "premiumTabMssActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Sending Service is active", "mailpoet"), "premiumTabMssNotActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Sending Service is not active.", "mailpoet"), "premiumTabMssActivateMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activate MailPoet Sending Service", "mailpoet"), "premiumTabMssKeyNotValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is not valid for the MailPoet Sending Service", "mailpoet")]);
        // line 248
        echo "
";
    }

    public function getTemplateName()
    {
        return "old_settings.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  347 => 248,  344 => 217,  341 => 216,  330 => 208,  326 => 206,  322 => 205,  318 => 204,  314 => 203,  310 => 202,  306 => 201,  302 => 200,  298 => 199,  293 => 198,  291 => 197,  289 => 196,  263 => 173,  259 => 171,  236 => 151,  231 => 148,  229 => 147,  188 => 108,  184 => 106,  182 => 105,  166 => 92,  129 => 58,  107 => 39,  97 => 31,  95 => 30,  87 => 25,  82 => 24,  76 => 22,  74 => 21,  70 => 20,  66 => 19,  62 => 18,  47 => 6,  43 => 4,  40 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "old_settings.html", "/home/users5/n/nauax/www/wp_nicolas-vaquier_fr/wp-content/plugins/mailpoet/views/old_settings.html");
    }
}
