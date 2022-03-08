<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="text" encoding="iso-8859-1" media-type="text/calendar"/>
<xsl:variable name="crlf">&#13;&#10;</xsl:variable>
<xsl:template match="/">BEGIN:VCALENDAR<xsl:value-of select="$crlf"/>
CALSCALE:GREGORIAN<xsl:value-of select="$crlf"/>
VERSION:2.0<xsl:value-of select="$crlf"/>
SEQUENCE:1<xsl:value-of select="$crlf"/>
X-WR-TIMEZONE:Europe/Paris<xsl:for-each select="seminars/seminar"><xsl:value-of select="$crlf"/>
BEGIN:VEVENT<xsl:value-of select="$crlf"/>
LOCATION:<xsl:value-of select="location"/><xsl:value-of select="$crlf"/>
DTSTART:<xsl:value-of select="date"/>T154500<xsl:value-of select="$crlf"/>
DTEND:<xsl:value-of select="date"/>T164500<xsl:value-of select="$crlf"/>
DESCRIPTION:seminar by <xsl:value-of select="speaker"/><xsl:value-of select="$crlf"/>
SUMMARY:<xsl:value-of select="abstract/title"/><xsl:value-of select="$crlf"/>
END:VEVENT<xsl:value-of select="$crlf"/></xsl:for-each>
END:VCALENDAR<xsl:value-of select="$crlf"/>
</xsl:template>
</xsl:stylesheet>
