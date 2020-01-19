<?xml version="1.0" encoding="utf-8"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>

<xsl:template match="/">
	<xsl:element name="h6">
		<xsl:value-of select="/rss/channel/item/title"/>
	</xsl:element>

	<xsl:element name="p">
		<xsl:value-of select="/rss/channel/item/description"/>
	</xsl:element>

	<xsl:element name="p">
		<xsl:text>Source: </xsl:text>
		<xsl:value-of select="/rss/channel/item/link"/>
	</xsl:element>

	<xsl:element name="p">
		<xsl:text>Publish date: </xsl:text>
		<xsl:value-of select="/rss/channel/item/pubDate"/>
	</xsl:element>
</xsl:template>

</xsl:stylesheet>