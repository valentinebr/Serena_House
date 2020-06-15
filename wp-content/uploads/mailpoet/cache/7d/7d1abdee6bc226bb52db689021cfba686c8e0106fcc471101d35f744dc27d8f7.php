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

/* settings/mta.html */
class __TwigTemplate_c1af0b712cf35d996ecbf819bb15648d6996db17e0b00e91a5c0e5d221f436b0 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["intervals"] = [0 => 1, 1 => 2, 2 => 5, 3 => 10, 4 => 15, 5 => 30];
        // line 2
        $context["default_frequency"] = ["website" => ["emails" => 25, "interval" => 5], "smtp" => ["emails" => 100, "interval" => 5]];
        // line 12
        echo "
<!-- mta: group -->
<input
  type=\"hidden\"
  id=\"mta_group\"
  name=\"mta_group\"
  value=\"";
        // line 18
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "mta_group", []), "html", null, true);
        echo "\"
/>
<input
  type=\"hidden\"
  id=\"mailpoet_smtp_provider\"
  name=\"mailpoet_smtp_provider\"
  value=\"";
        // line 24
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["settings"] ?? null), "smtp_provider", []), "html", null, true);
        echo "\"
/>
<!-- mta: method -->
<input
  type=\"hidden\"
  id=\"mta_method\"
  name=\"mta[method]\"
  value=\"";
        // line 31
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "method", []), "html", null, true);
        echo "\"
/>

<!-- mta: sending frequency -->
<input
  type=\"hidden\"
  id=\"mta_frequency_emails\"
  name=\"mta[frequency][emails]\"
  value=\"";
        // line 39
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "frequency", []), "emails", []), "html", null, true);
        echo "\"
/>
<input
  type=\"hidden\"
  id=\"mta_frequency_interval\"
  name=\"mta[frequency][interval]\"
  value=\"";
        // line 45
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "frequency", []), "interval", []), "html", null, true);
        echo "\"
/>

<!-- mta: mailpoet sending service key -->
<input
  type=\"hidden\"
  id=\"mailpoet_api_key\"
  name=\"mta[mailpoet_api_key]\"
  value=\"";
        // line 53
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "mailpoet_api_key", []), "html", null, true);
        echo "\"
/>

<div id=\"mailpoet_sending_method_setup\">
  <!-- Sending Method: Other -->
  <div class=\"mailpoet_sending_method\" data-group=\"other\" style=\"display:none;\">
    <table class=\"form-table\">
      <tr>
        <th scope=\"row\">
          <label for=\"mailpoet_smtp_method\">
            ";
        // line 63
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Method");
        echo "
          </label>
        </th>
        <td>
          <!-- smtp provider -->
          <select
            id=\"mailpoet_smtp_method\"
            name=\"smtp_provider\"
          >
            <option data-interval=\"5\" data-emails=\"25\" value=\"server\">
              ";
        // line 73
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your web host / web server");
        echo "
            </option>
            <option data-interval=\"5\" data-emails=\"100\" value=\"manual\"
              ";
        // line 77
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", []) == "smtp")) {
            // line 79
            echo "              selected=\"selected\"
              ";
        }
        // line 81
        echo "            >
              ";
        // line 82
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("SMTP");
        echo "
            </option>
            <!-- providers -->
            <optgroup label=\"";
        // line 85
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select your provider");
        echo "\">
              ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = \MailPoetVendor\twig_ensure_traversable($this->getAttribute(($context["hosts"] ?? null), "smtp", []));
        foreach ($context['_seq'] as $context["host_key"] => $context["host"]) {
            // line 87
            echo "              <option
                value=\"";
            // line 88
            echo \MailPoetVendor\twig_escape_filter($this->env, $context["host_key"], "html", null, true);
            echo "\"
                data-emails=\"";
            // line 89
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($context["host"], "emails", []), "html", null, true);
            echo "\"
                data-interval=\"";
            // line 90
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($context["host"], "interval", []), "html", null, true);
            echo "\"
                data-fields=\"";
            // line 91
            echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_join_filter($this->getAttribute($context["host"], "fields", []), ","), "html", null, true);
            echo "\"
              ";
            // line 92
            if (($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) == $context["host_key"])) {
                // line 93
                echo "              selected=\"selected\"
              ";
            }
            // line 95
            echo "              >";
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($context["host"], "name", []), "html", null, true);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['host_key'], $context['host'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "            </optgroup>
          </select>
        </td>
      </tr>
      <tr id=\"mailpoet_sending_method_host\"
        ";
        // line 103
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", []) == "smtp")) {
            // line 105
            echo "        style=\"display:none;\"
        ";
        }
        // line 107
        echo "      >
        <th scope=\"row\">
          <label for=\"mailpoet_web_host\">
            ";
        // line 110
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your web host");
        echo "
          </label>
        </th>
        <td>
          <p>
            <!-- sending frequency -->
            <select
              id=\"mailpoet_web_host\"
              name=\"web_host\"
            >

              <!-- web hosts -->
              <option
                value=\"manual\"
                data-emails=\"25\"
                data-interval=\"5\"
                label=\"";
        // line 126
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Not listed (default)");
        echo "\"
              >
              ";
        // line 128
        $context['_parent'] = $context;
        $context['_seq'] = \MailPoetVendor\twig_ensure_traversable($this->getAttribute(($context["hosts"] ?? null), "web", []));
        foreach ($context['_seq'] as $context["host_key"] => $context["host"]) {
            // line 129
            echo "              <option
                value=\"";
            // line 130
            echo \MailPoetVendor\twig_escape_filter($this->env, $context["host_key"], "html", null, true);
            echo "\"
                data-emails=\"";
            // line 131
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($context["host"], "emails", []), "html", null, true);
            echo "\"
                data-interval=\"";
            // line 132
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($context["host"], "interval", []), "html", null, true);
            echo "\"
              ";
            // line 133
            if (($this->getAttribute(($context["settings"] ?? null), "web_host", []) == $context["host_key"])) {
                // line 134
                echo "              selected=\"selected\"
              ";
            }
            // line 136
            echo "              >";
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($context["host"], "name", []), "html", null, true);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['host_key'], $context['host'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "            </select>
          </p>

        </td>
      </tr>
      <tr>
        <th scope=\"row\">
          <label for=\"mailpoet_web_host\">
            ";
        // line 146
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sending frequency");
        echo "
          </label>
        </th>
        <td>
          <p>
            <!-- sending frequency -->
            <select
              id=\"mailpoet_sending_frequency\"
              name=\"mailpoet_sending_frequency\"
            >
              <option value=\"auto\">
                ";
        // line 157
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Recommended");
        echo "
              </option>
              <option value=\"manual\"
                ";
        // line 161
        if ( !($this->getAttribute(($context["settings"] ?? null), "mailpoet_sending_frequency", []) == "auto")) {
            // line 163
            echo "                selected=\"selected\"
                ";
        }
        // line 165
        echo "              >
                ";
        // line 166
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("I'll set my own frequency");
        echo "
              </option>
            </select>
            <span id=\"mailpoet_recommended_daily_emails\"></span>
          </p>
          <div id=\"mailpoet_sending_frequency_manual\"
            ";
        // line 173
        if (($this->getAttribute(($context["settings"] ?? null), "mailpoet_sending_frequency", []) == "auto")) {
            // line 175
            echo "              style=\"display: none\"
            ";
        }
        // line 177
        echo "          >
            <p>
              <input
                id=\"other_frequency_emails\"
                type=\"number\"
                min=\"1\"
                max=\"1000\"
              ";
        // line 184
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "frequency", []), "emails", [])) {
            // line 185
            echo "                value=\"";
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "frequency", []), "emails", []), "html", null, true);
            echo "\"
              ";
        } else {
            // line 187
            echo "                value=\"";
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["default_frequency"] ?? null), "website", []), "emails", []), "html", null, true);
            echo "\"
              ";
        }
        // line 189
        echo "              />
              ";
        // line 190
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("emails");
        echo "
              <select id=\"other_frequency_interval\">
                ";
        // line 192
        $context['_parent'] = $context;
        $context['_seq'] = \MailPoetVendor\twig_ensure_traversable(($context["intervals"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["interval"]) {
            // line 193
            echo "                <option
                  value=\"";
            // line 194
            echo \MailPoetVendor\twig_escape_filter($this->env, $context["interval"], "html", null, true);
            echo "\"
                ";
            // line 196
            if (( !$this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "frequency", []), "interval", []) && (            // line 197
$context["interval"] == $this->getAttribute($this->getAttribute(($context["default_frequency"] ?? null), "website", []), "interval", [])))) {
                // line 199
                echo "                selected=\"selected\"
                ";
            }
            // line 201
            echo "                ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "frequency", []), "interval", []) == $context["interval"])) {
                // line 202
                echo "                selected=\"selected\"
                ";
            }
            // line 204
            echo "                >
                ";
            // line 205
            echo $this->env->getExtension('MailPoet\Twig\Functions')->getSendingFrequency($context["interval"]);
            echo "
                ";
            // line 206
            if (($context["interval"] == $this->getAttribute($this->getAttribute(($context["default_frequency"] ?? null), "website", []), "interval", []))) {
                // line 207
                echo "                (";
                echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("recommended");
                echo ")
                ";
            }
            // line 209
            echo "                </option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['interval'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 211
        echo "              </select>
              <span id=\"mailpoet_other_daily_emails\"></span>
            </p>
            <br />
            <p>
              ";
        // line 216
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("<strong>Warning!</strong> You may break the terms of your web host or provider by sending more than the recommended emails per day. Contact your host if you want to send more.");
        echo "
            </p>
          </div>
        </td>
      </tr>
      <tr class=\"mailpoet_smtp_field\" data-field=\"host\"
        ";
        // line 223
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "manual"))) {
            // line 225
            echo "        style=\"display:none;\"
        ";
        }
        // line 227
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_host]\">
            ";
        // line 230
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("SMTP Hostname");
        echo "
          </label>
          <p class=\"description\">
            ";
        // line 233
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("e.g.: smtp.mydomain.com");
        echo "
          </p>
        </th>
        <td>
          <input
            type=\"text\"
            class=\"regular-text\"
            id=\"settings[mta_host]\"
            name=\"mta[host]\"
            value=\"";
        // line 242
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "host", []), "html", null, true);
        echo "\" />
        </td>
      </tr>
      <!-- smtp: port -->
      <tr class=\"mailpoet_smtp_field\" data-field=\"port\"
        ";
        // line 248
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "manual"))) {
            // line 250
            echo "        style=\"display:none;\"
        ";
        }
        // line 252
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_port]\">
            ";
        // line 255
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("SMTP Port");
        echo "
          </label>
        </th>
        <td>
          <input
            type=\"number\"
            max=\"65535\"
            min=\"1\"
            maxlength=\"5\"
            style=\"width:5em;\"
            id=\"settings[mta_port]\"
            name=\"mta[port]\"
            value=\"";
        // line 267
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "port", []), "html", null, true);
        echo "\"
          />
        </td>
      </tr>

      <!-- smtp: amazon region -->
      <tr class=\"mailpoet_aws_field\" data-field=\"region\"
        ";
        // line 275
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "AmazonSES"))) {
            // line 277
            echo "        style=\"display:none;\"
        ";
        }
        // line 279
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_region]\">
            ";
        // line 282
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Region");
        echo "
          </label>
        </th>
        <td>
          <select
            id=\"settings[mta_region]\"
            name=\"mta[region]\"
            value=\"";
        // line 289
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", []) == "smtp")) {
            // line 290
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "region", []), "html", null, true);
        }
        // line 291
        echo "\"
          >
            ";
        // line 293
        $context['_parent'] = $context;
        $context['_seq'] = \MailPoetVendor\twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["hosts"] ?? null), "smtp", []), "AmazonSES", []), "regions", []));
        foreach ($context['_seq'] as $context["region"] => $context["server"]) {
            // line 294
            echo "            <option
              value=\"";
            // line 295
            echo \MailPoetVendor\twig_escape_filter($this->env, $context["server"], "html", null, true);
            echo "\"
            ";
            // line 296
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "region", []) == $context["server"])) {
                // line 297
                echo "            selected=\"selected\"
            ";
            }
            // line 299
            echo "            >
            ";
            // line 300
            echo \MailPoetVendor\twig_escape_filter($this->env, $context["region"], "html", null, true);
            echo "
            </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['region'], $context['server'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 303
        echo "          </select>
        </td>
      </tr>

      <!-- smtp: amazon access_key -->
      <tr class=\"mailpoet_aws_field\" data-field=\"access_key\"
        ";
        // line 310
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "AmazonSES"))) {
            // line 312
            echo "        style=\"display:none;\"
        ";
        }
        // line 314
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_access_key]\">
            ";
        // line 317
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Access Key");
        echo "
          </label>
        </th>
        <td>
          <input
            type=\"text\"
            class=\"regular-text\"
            id=\"settings[mta_access_key]\"

            name=\"mta[access_key]\"
            value=\"";
        // line 327
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", []) == "smtp")) {
            // line 328
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "access_key", []), "html", null, true);
        }
        // line 329
        echo "\"
          />
        </td>
      </tr>

      <!-- smtp: amazon secret_key -->
      <tr class=\"mailpoet_aws_field\" data-field=\"secret_key\"
        ";
        // line 337
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "AmazonSES"))) {
            // line 339
            echo "        style=\"display:none;\"
        ";
        }
        // line 341
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_secret_key]\">
            ";
        // line 344
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Secret Key");
        echo "
          </label>
        </th>
        <td>
          <input
            type=\"text\"
            class=\"regular-text\"
            id=\"settings[mta_secret_key]\"

            name=\"mta[secret_key]\"
            value=\"";
        // line 354
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", []) == "smtp")) {
            // line 355
            echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "secret_key", []), "html", null, true);
        }
        // line 356
        echo "\"
          />
        </td>
      </tr>

      <!-- smtp: api key -->
      <tr class=\"mailpoet_sendgrid_field\" data-field=\"api_key\"
        ";
        // line 364
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "SendGrid"))) {
            // line 366
            echo "        style=\"display:none;\"
        ";
        }
        // line 368
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_api_key]\">
            ";
        // line 371
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("API Key");
        echo "
          </label>
        </th>
        <td>
          <input
            type=\"text\"
            class=\"regular-text\"
            id=\"settings[mta_api_key]\"
            name=\"mta[api_key]\"
            value=\"";
        // line 380
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "api_key", []), "html", null, true);
        echo "\"
          />
        </td>
      </tr>

      <!-- smtp: login -->
      <tr id=\"mta_login\" class=\"mailpoet_smtp_field\" data-field=\"login\"
        ";
        // line 388
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "manual"))) {
            // line 390
            echo "        style=\"display:none;\"
        ";
        }
        // line 392
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_login]\">
            ";
        // line 395
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Login");
        echo "
          </label>
        </th>
        <td>
          <input
            type=\"text\"
            class=\"regular-text\"
            id=\"settings[mta_login]\"
            name=\"mta[login]\"
            value=\"";
        // line 404
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "login", []), "html", null, true);
        echo "\"
          />
        </td>
      </tr>
      <!-- smtp: password -->
      <tr id=\"mta_password\" class=\"mailpoet_smtp_field\" data-field=\"password\"
        ";
        // line 411
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "manual"))) {
            // line 413
            echo "        style=\"display:none;\"
        ";
        }
        // line 415
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_password]\">
            ";
        // line 418
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Password");
        echo "
          </label>
        </th>
        <td>
          <input
            type=\"password\"
            class=\"regular-text\"
            id=\"settings[mta_password]\"
            name=\"mta[password]\"
            value=\"";
        // line 427
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "password", []), "html", null, true);
        echo "\"
          />
        </td>
      </tr>
      <!-- smtp: security protocol -->
      <tr class=\"mailpoet_smtp_field\" data-field=\"encryption\"
        ";
        // line 434
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "manual"))) {
            // line 436
            echo "        style=\"display:none;\"
        ";
        }
        // line 438
        echo "      >
        <th scope=\"row\">
          <label for=\"settings[mta_encryption]\">
            ";
        // line 441
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Secure Connection");
        echo "
          </label>
        </th>
        <td>
          <select id=\"settings[mta_encryption]\" name=\"mta[encryption]\">
            <option value=\"\">";
        // line 446
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "</option>
            <option
              value=\"ssl\"
            ";
        // line 449
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "encryption", []) == "ssl")) {
            // line 450
            echo "            selected=\"selected\"
            ";
        }
        // line 452
        echo "            >SSL</option>
            <option
              value=\"tls\"
            ";
        // line 455
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "encryption", []) == "tls")) {
            // line 456
            echo "            selected=\"selected\"
            ";
        }
        // line 458
        echo "            >TLS</option>
          </select>
        </td>
      </tr>
      <!-- smtp: authentication -->
      <tr class=\"mailpoet_smtp_field\" data-field=\"authentication\"
        ";
        // line 465
        if ((($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "smtp") || ($this->getAttribute(($context["settings"] ?? null), "smtp_provider", []) != "manual"))) {
            // line 467
            echo "        style=\"display:none;\"
        ";
        }
        // line 469
        echo "      >
        <th scope=\"row\">
          <label>
            ";
        // line 472
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Authentication");
        echo "
          </label>
          <p class=\"description\">
            ";
        // line 475
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Leave this option set to Yes. Only a tiny portion of SMTP services prefer Authentication to be turned off.");
        echo "
          </p>
        </th>
        <td>
          <label>
            <input
              type=\"radio\"
              value=\"1\"
              name=\"mta[authentication]\"
            ";
        // line 485
        if (( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "authentication", []) || ($this->getAttribute($this->getAttribute(        // line 486
($context["settings"] ?? null), "mta", []), "authentication", []) == "1"))) {
            // line 487
            echo "            checked=\"checked\"
            ";
        }
        // line 489
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
          </label>
          &nbsp;
          <label>
            <input
              type=\"radio\"
              value=\"-1\"
              name=\"mta[authentication]\"
            ";
        // line 497
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "mta", []), "authentication", []) == "-1")) {
            // line 498
            echo "            checked=\"checked\"
            ";
        }
        // line 500
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
          </label>
        </td>
      </tr>
      </tbody>
    </table>

    <table class=\"form-table\">
      <tbody>
        <!-- SPF -->
        <tr id=\"mailpoet_mta_spf\">
          <th scope=\"row\">
            <label>
              ";
        // line 513
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("SPF Signature (Highly recommended!)");
        echo "
            </label>
            <p class=\"description\">
              ";
        // line 516
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This improves your delivery rate by verifying that you're allowed to send emails from your domain.");
        echo "
            </p>
          </th>
          <td>
            <p>
              ";
        // line 521
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("SPF is set up in your DNS. Read your host's support documentation for more information.");
        echo "
            </p>
          </td>
        </tr>
        <!-- test method -->
        <tr>
          <th scope=\"row\">
            <label for=\"mailpoet_mta_test_email\">
              ";
        // line 529
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Test the sending method");
        echo "
            </label>
          </th>
          <td>
            <p>
              <input
                type=\"text\"
                id=\"mailpoet_mta_test_email\"
                class=\"regular-text\"
                value=\"";
        // line 538
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["current_user"] ?? null), "user_email", []), "html", null, true);
        echo "\"
              />
              <a
                id=\"mailpoet_mta_test\"
                class=\"button-secondary\"
              >";
        // line 543
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Send a test email");
        echo "</a>

              <span id=\"tooltip-test\"></span>
            </p>
          </td>
        </tr>
        <!-- activate or cancel -->
        <tr>
          <th scope=\"row\">
            <p>
              <a
                href=\"javascript:;\"
                class=\"mailpoet_mta_setup_save button button-primary\"
              >";
        // line 556
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activate");
        echo "</a>
              &nbsp;
              <a
                href=\"javascript:;\"
                class=\"mailpoet_mta_setup_cancel\"
              >";
        // line 561
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("or Cancel");
        echo "</a>
            </p>
          </th>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<script type=\"text/javascript\">
  jQuery(function(\$) {
    var tooltip = '";
        // line 573
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("Didn't receive the test email? Read our [link]quick guide[/link] to sending issues."), "https://kb.mailpoet.com/article/146-my-newsletters-are-not-being-received", ["target" => "_blank", "data-beacon-article" => "580846f09033604df5166ed1"]), "js"), "html", null, true);
        // line 575
        echo "'

    MailPoet.helpTooltip.show(document.getElementById(\"tooltip-test\"), {
      tooltipId: \"tooltip-settings-test\",
      tooltip: tooltip,
    });

    var sending_frequency_template =
      Handlebars.compile(\$('#mailpoet_sending_frequency_template').html());

    // om dom loaded
    \$(function() {
      // constrain number type inputs
      \$('input[type=\"number\"]').on('keyup', function() {
        var currentValue = \$(this).val();
        if(!currentValue) return;

        var minValue = \$(this).attr('min');
        var maxValue = \$(this).attr('max');
        \$(this).val(Math.min(Math.max(minValue, currentValue), maxValue));
      });

      // testing sending method
      \$('#mailpoet_mta_test').on('click', function() {
        // get test email and include it in data
        var recipient = \$('#mailpoet_mta_test_email').val();

        var settings = jQuery('#mailpoet_settings_form').mailpoetSerializeObject();
        var mailer = settings.mta;

        mailer.method = getMethodFromGroup(\$('#mailpoet_smtp_method').val());

        // check that we have a from address
        if(settings.sender.address.length === 0) {
          // validation
          return MailPoet.Notice.error(
            '";
        // line 611
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("The email could not be sent. Make sure the option \"Email notifications\" has a FROM email address in the Basics tab."), "js"), "html", null, true);
        echo "',
            { scroll: true, static: true }
          );
        }

        MailPoet.Modal.loading(true);
        MailPoet.Ajax.post({
          api_version: window.mailpoet_api_version,
          endpoint: 'mailer',
          action: 'send',
          data: {
            mailer: mailer,
            newsletter: {
              subject: \"";
        // line 624
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This is a Sending Method Test");
        echo "\",
              body: {
                html: \"<p>";
        // line 626
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yup, it works! You can start blasting away emails to the moon.");
        echo "</p>\",
                text: \"";
        // line 627
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yup, it works! You can start blasting away emails to the moon.");
        echo "\"
              }
            },
            subscriber: recipient
          }
        }).always(function() {
          MailPoet.Modal.loading(false);
        }).done(function(response) {
          MailPoet.Notice.success(
            \"";
        // line 636
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("The email has been sent! Check your inbox."), "js"), "html", null, true);
        echo "\",
            { scroll: true }
          );
          trackTestEmailSent(mailer, true);
        }).fail(function(response) {
          if (response.errors.length > 0) {
            MailPoet.Notice.error(
              response.errors.map(function(error) { return _.escape(error.message); }),
              { scroll: true }
            );
          }
          trackTestEmailSent(mailer, false);
        });
      });

      // sending frequency update based on selected provider
      \$('#mailpoet_web_host').on('change keyup', renderHostSendingFrequency);

      // update manual sending frequency when values are changed
      \$('#other_frequency_emails').on('change keyup', function() {
        updateSendingFrequency('other');
      });
      \$('#other_frequency_interval').on('change keyup', function() {
        updateSendingFrequency('other');
      });

      // save configuration of a sending method
      \$('.mailpoet_sending_service_activate').on('click', function(e, navigateToTab) {
        \$('#mta_group').val('mailpoet');
        saveSendingMethodConfiguration('mailpoet', navigateToTab);
        if (MailPoetLib && MailPoetLib.checkSPFRecord) {
          MailPoetLib.checkSPFRecord.default();
        }
      });
      \$('.mailpoet_mta_setup_save').on('click', function() {
        \$('#mailpoet_smtp_method').trigger(\"change\");
        \$('#other_frequency_emails').trigger(\"change\");
        // get selected method
        var group = \$('.mailpoet_sending_method:visible').data('group');
        saveSendingMethodConfiguration(group);
      });
      \$('#mailpoet_smtp_method').on('change keyup', renderHostsSelect);
      \$('#mailpoet_sending_frequency').on('change keyup', sendingFrequencyMethodUpdated);

      ";
        // line 680
        if (($this->getAttribute(($context["settings"] ?? null), "mta_group", []) != "mailpoet")) {
            // line 681
            echo "        \$('#mailpoet_smtp_method').trigger(\"change\");
        \$('#other_frequency_emails').trigger(\"change\");
      ";
        }
        // line 684
        echo "
      function saveSendingMethodConfiguration(group, navigateToTab) {
        // set sending method
        if(group === undefined) {
          MailPoet.Notice.error(
            \"";
        // line 689
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("You have selected an invalid sending method."), "js"), "html", null, true);
        echo "\"
          );
        } else {
          // set new sending method active
          setSendingMethodGroup(group);

          // enforce signup confirmation depending on selected group
          setSignupConfirmation(group);

          // save settings
          \$('.mailpoet_settings_submit > input').trigger('click');

          // back to selection of sending methods
          if (navigateToTab === undefined || navigateToTab === true) {
            MailPoet.Router.navigate('mta', { trigger: true });
          }
        }
      }

      function setSignupConfirmation(group) {
        if (group === 'mailpoet') {
          // force signup confirmation (select \"Yes\")
          \$('.mailpoet_signup_confirmation[value=\"1\"]').attr('checked', true);
          \$('.mailpoet_signup_confirmation[value=\"\"]').attr('checked', false);

          // hide radio inputs
          \$('#mailpoet_signup_confirmation_input').hide();

          // show mailpoet specific notice
          \$('#mailpoet_signup_confirmation_notice').show();

          // show signup confirmation options
          \$('#mailpoet_signup_options').show();
        } else {
          // show radio inputs
          \$('#mailpoet_signup_confirmation_input').show();

          // hide mailpoet specific notice
          \$('#mailpoet_signup_confirmation_notice').hide();
        }
      }

      function setSendingMethodGroup(group) {
        // deactivate other sending methods
        \$('.mailpoet_sending_methods .mailpoet_active')
          .removeClass('mailpoet_active');

        // set active sending method
        \$('.mailpoet_sending_methods li[data-group=\"'+group+'\"]')
          .addClass('mailpoet_active');

        var method = getMethodFromGroup(\$('#mta_group').val());

        \$('#mta_method').val(method);

        // set MailPoet method description
        \$('#mailpoet_sending_method_active_text')
          .toggleClass('mailpoet_hidden', group !== 'mailpoet');
        \$('#mailpoet_sending_method_inactive_text')
          .toggleClass('mailpoet_hidden', group === 'mailpoet');

        // Hide server error notices
        \$('.mailpoet_notice_server').hide();

        updateMSSActivationUI();
      }

      function getMethodFromGroup(group) {
        var group = group || 'website';

        switch(group) {
          case 'mailpoet':
            return 'MailPoet';
          break;
          case 'server':
          case 'website':
            return 'PHPMail';
          break;
          case 'manual':
          case 'smtp':
            var method = \$('#mailpoet_smtp_provider').val();
            if(method === 'manual') {
              return 'SMTP';
            }
            return method;
          break;
          default:
            return group;
        }
      }

      // cancel configuration of a sending method
      \$('.mailpoet_mta_setup_cancel').on('click', function() {
        // back to selection of sending methods
        MailPoet.Router.navigate('mta', { trigger: true });
      });

      // render sending frequency form
      \$('#mailpoet_smtp_provider').trigger('change');
      \$('#mailpoet_web_host').trigger('change');

      function trackTestEmailSent(mailer, success) {
        MailPoet.trackEvent(
          'User has sent a test email from Settings',
          {
            'Sending was successful': !!success,
            'Sending method type': mailer.method,
            'MailPoet Free version': window.mailpoet_version
          }
        );
      }

      \$('.mailpoet_sending_methods_help a').on('click', function() {
        MailPoet.trackEvent(
          'User has clicked to view the sending comparison table',
          {'MailPoet Free version': window.mailpoet_version}
        );
      });
    });

    function setProviderForm() {
      // check provider
      var provider = \$(this).find('option:selected').first();
      var fields = provider.data('fields');

      if(fields === undefined) {
        fields = [
          'host',
          'port',
          'login',
          'password',
          'authentication',
          'encryption'
        ];
      } else {
        fields = fields.split(',');
      }

      \$('.mailpoet_smtp_field').hide();

      fields.map(function(field) {
        \$('.mailpoet_smtp_field[data-field=\"'+field+'\"]').show();
      });

      // update sending frequency
      renderSMTPSendingFrequency(provider);
    }

    function renderSMTPSendingFrequency() {
      // set sending frequency
      var emails = \$('#smtp_frequency_emails').val();
      var interval = \$('#smtp_frequency_interval').val();
      setSendingFrequency({
        output: '#mailpoet_smtp_daily_emails',
        only_daily: true,
        emails: emails,
        interval: interval
      });
      \$('#mta_frequency_emails').val(emails);
      \$('#mta_frequency_interval').val(interval);
    }

    function sendingFrequencyMethodUpdated() {
      var method = \$(this).find('option:selected').first();
      var sendingMethod = \$('#mailpoet_smtp_method').find('option:selected').first().val();
      if(method.val() === \"manual\") {
        \$('#mailpoet_sending_frequency_manual').show();
        \$('#mailpoet_recommended_daily_emails').hide();
        \$('#other_frequency_emails').trigger(\"change\");
      } else {
        \$('#mailpoet_sending_frequency_manual').hide();
        if(sendingMethod !== \"server\") {
          \$('#mailpoet_recommended_daily_emails').show();
        }
        \$('#mailpoet_smtp_method').trigger(\"change\");
      }
    }

    function renderHostsSelect() {
      var method = \$(this).find('option:selected').first();
      var val = method.val();

      if(val === \"server\") {
        \$('#mailpoet_sending_method_host').show();
        \$('#mta_group').val('website');
      } else {
        \$('#mailpoet_sending_method_host').hide();
      }
      if(val === \"manual\") {
        \$('.mailpoet_smtp_field').show();
        \$('#mta_group').val('smtp');
        \$('#mailpoet_smtp_provider').val('manual');
      } else {
        \$('.mailpoet_smtp_field').hide();
      }
      if(val === \"AmazonSES\") {
        \$('.mailpoet_aws_field').show();
        \$('#mta_group').val('smtp');
        \$('#mailpoet_smtp_provider').val('AmazonSES');
      } else {
        \$('.mailpoet_aws_field').hide();
      }
      if(val === \"SendGrid\") {
        \$('.mailpoet_sendgrid_field').show();
        \$('#mta_group').val('smtp');
        \$('#mailpoet_smtp_provider').val('SendGrid');
      } else {
        \$('.mailpoet_sendgrid_field').hide();
      }
      var emails = method.data('emails');
      var interval = method.data('interval');
      if(val === \"server\") {
        emails = \$('#mailpoet_web_host').find('option:selected').first().data('emails');
        interval = \$('#mailpoet_web_host').find('option:selected').first().data('interval');
      }
      const frequencyMethod = \$('#mailpoet_sending_frequency').find('option:selected').first().val();
      if(frequencyMethod === \"manual\") {
        \$('#mailpoet_recommended_daily_emails').hide();
        emails = \$('#other_frequency_emails').val();
        interval = \$('#other_frequency_interval').val();
      } else {
        \$('#mailpoet_recommended_daily_emails').show();
      }
      setSendingFrequency({
        output: '#mailpoet_recommended_daily_emails',
        only_daily: false,
        emails: emails,
        interval: interval
      });
      \$('#mta_frequency_emails').val(emails);
      \$('#mta_frequency_interval').val(interval);
    }

    function renderHostSendingFrequency() {
      var host = \$(this).find('option:selected').first();
      var frequencyType = \$(\"#mailpoet_sending_frequency\").find('option:selected').first().val();

      var emails =
        host.data('emails') || ";
        // line 927
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["default_frequency"] ?? null), "website", []), "emails", []), "html", null, true);
        echo ";
      var interval =
        host.data('interval') || ";
        // line 929
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["default_frequency"] ?? null), "website", []), "interval", []), "html", null, true);
        echo ";
      var fields =
        host.data('fields') || '';

      if (frequencyType === \"manual\") {
        return;
      } else {
        setSendingFrequency({
          output: '#mailpoet_recommended_daily_emails',
          only_daily: false,
          emails: emails,
          interval: interval
        });
      }

      \$('#mta_frequency_emails').val(emails);
      \$('#mta_frequency_interval').val(interval);
    }

    function updateSendingFrequency(method) {
      // get emails
      var options = {
        only_daily: true,
        emails: \$('#'+method+'_frequency_emails').val(),
        interval: \$('#'+method+'_frequency_interval').val()
      };

      var MINUTES_PER_DAY = 1440;
      var SECONDS_PER_DAY = 86400;

      options.daily_emails = ~~(
        (MINUTES_PER_DAY / options.interval) * options.emails
      );

      options.emails_per_second = (~~(
        ((options.daily_emails) / 86400) * 10)
      ) / 10;


      // format daily emails number according to locale
      options.daily_emails = options.daily_emails.toLocaleString();

      \$('#mailpoet_'+method+'_daily_emails').html(
        sending_frequency_template(options)
      );

      // update actual sending frequency values
      \$('#mta_frequency_emails').val(options.emails);
      \$('#mta_frequency_interval').val(options.interval);
    }

    function setSendingFrequency(options) {
      options.daily_emails = ~~((1440 / options.interval) * options.emails);

      // format daily emails number according to locale
      options.daily_emails = options.daily_emails.toLocaleString();
      \$(options.output).html(
        sending_frequency_template(options)
      );
    }

    Handlebars.registerHelper('format_time', function(value, block) {
      var label = null;
      var labels = {
        minute: \"";
        // line 993
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("every minute");
        echo "\",
        minutes: \"";
        // line 994
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("every %1\$d minutes");
        echo "\",
        hour: \"";
        // line 995
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("every hour");
        echo "\",
        hours: \"";
        // line 996
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("every %1\$d hours");
        echo "\"
      };

      // cast time as int
      value = ~~(value);

      // format time depending on the value
      if(value >= 60) {
        // we're dealing with hours
        if(value === 60) {
          label = labels.hour;
        } else {
          label = labels.hours;
        }
        value /= 60;
      } else {
        // we're dealing with minutes
        if(value === 1) {
          label = labels.minute;
        } else {
          label = labels.minutes;
        }
      }

      if(label !== null) {
        return label.replace('%1\$d', value);
      } else {
        return value;
      }
    });
  });

  // enable/disable MSS method activate button and notice
  function updateMSSActivationUI() {
    var \$ = jQuery;
    var group = \$('.mailpoet_sending_methods .mailpoet_active').data('group');
    var key_valid = !!\$('.mailpoet_mss_key_valid');

    if (group !== 'mailpoet') {
      \$('.mailpoet_actions .mailpoet_invalid_key').toggleClass('mailpoet_hidden', key_valid);
      \$('.mailpoet_actions .mailpoet_valid_key').toggleClass('mailpoet_hidden', !key_valid);
      \$('.mailpoet_other_sending_method_action').removeClass('button-primary').addClass('button-secondary').text('";
        // line 1037
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Configure");
        echo "');
    } else {
      \$('.mailpoet_actions .mailpoet_valid_key').addClass('mailpoet_hidden');
      \$('.mailpoet_activated').toggleClass('mailpoet_hidden', !key_valid);
      \$('.mailpoet_other_sending_method_action').removeClass('button-secondary').addClass('button-primary').text('";
        // line 1041
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activate");
        echo "');
      \$('.mailpoet_invalid_key').toggleClass('mailpoet_hidden', key_valid);
      \$('.mailpoet_sending_methods li[data-group=\"'+group+'\"], .mailpoet_sending_methods li[data-group=\"'+group+'\"] > .mailpoet_status').toggleClass('mailpoet_invalid_key', !key_valid)
    }

    if (key_valid) {
        \$('.mailpoet_mss_activate_notice').toggle(group !== 'mailpoet');
      }
  };
</script>

";
        // line 1052
        echo $this->env->getExtension('MailPoet\Twig\Handlebars')->generatePartial($this->env, $context, "mailpoet_sending_frequency_template", "settings/templates/sending_frequency.hbs");
        // line 1055
        echo "
";
    }

    public function getTemplateName()
    {
        return "settings/mta.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1453 => 1055,  1451 => 1052,  1437 => 1041,  1430 => 1037,  1386 => 996,  1382 => 995,  1378 => 994,  1374 => 993,  1307 => 929,  1302 => 927,  1061 => 689,  1054 => 684,  1049 => 681,  1047 => 680,  1000 => 636,  988 => 627,  984 => 626,  979 => 624,  963 => 611,  925 => 575,  923 => 573,  908 => 561,  900 => 556,  884 => 543,  876 => 538,  864 => 529,  853 => 521,  845 => 516,  839 => 513,  822 => 500,  818 => 498,  816 => 497,  804 => 489,  800 => 487,  798 => 486,  797 => 485,  785 => 475,  779 => 472,  774 => 469,  770 => 467,  768 => 465,  760 => 458,  756 => 456,  754 => 455,  749 => 452,  745 => 450,  743 => 449,  737 => 446,  729 => 441,  724 => 438,  720 => 436,  718 => 434,  709 => 427,  697 => 418,  692 => 415,  688 => 413,  686 => 411,  677 => 404,  665 => 395,  660 => 392,  656 => 390,  654 => 388,  644 => 380,  632 => 371,  627 => 368,  623 => 366,  621 => 364,  612 => 356,  609 => 355,  607 => 354,  594 => 344,  589 => 341,  585 => 339,  583 => 337,  574 => 329,  571 => 328,  569 => 327,  556 => 317,  551 => 314,  547 => 312,  545 => 310,  537 => 303,  528 => 300,  525 => 299,  521 => 297,  519 => 296,  515 => 295,  512 => 294,  508 => 293,  504 => 291,  501 => 290,  499 => 289,  489 => 282,  484 => 279,  480 => 277,  478 => 275,  468 => 267,  453 => 255,  448 => 252,  444 => 250,  442 => 248,  434 => 242,  422 => 233,  416 => 230,  411 => 227,  407 => 225,  405 => 223,  396 => 216,  389 => 211,  382 => 209,  376 => 207,  374 => 206,  370 => 205,  367 => 204,  363 => 202,  360 => 201,  356 => 199,  354 => 197,  353 => 196,  349 => 194,  346 => 193,  342 => 192,  337 => 190,  334 => 189,  328 => 187,  322 => 185,  320 => 184,  311 => 177,  307 => 175,  305 => 173,  296 => 166,  293 => 165,  289 => 163,  287 => 161,  281 => 157,  267 => 146,  257 => 138,  248 => 136,  244 => 134,  242 => 133,  238 => 132,  234 => 131,  230 => 130,  227 => 129,  223 => 128,  218 => 126,  199 => 110,  194 => 107,  190 => 105,  188 => 103,  181 => 97,  172 => 95,  168 => 93,  166 => 92,  162 => 91,  158 => 90,  154 => 89,  150 => 88,  147 => 87,  143 => 86,  139 => 85,  133 => 82,  130 => 81,  126 => 79,  124 => 77,  118 => 73,  105 => 63,  92 => 53,  81 => 45,  72 => 39,  61 => 31,  51 => 24,  42 => 18,  34 => 12,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "settings/mta.html", "/home/users5/n/nauax/www/wp_nicolas-vaquier_fr/wp-content/plugins/mailpoet/views/settings/mta.html");
    }
}
